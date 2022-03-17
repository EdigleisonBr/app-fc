<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SoccerMatche;
use App\Models\GoalsAthletes;
use App\Models\Place;
use App\Models\Team;
use App\Models\Referee;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SoccerMatcheController extends Controller
{
    public function index(){
        //return current month
        $now = Carbon::now();
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        $month = ucfirst(utf8_encode(strftime("%B", strtotime($now))));

        // return schedules dates
        $m = date('m');
        $y = date('Y');

        $m1 = $this->month($m);

        $monthYear = $m1 ." / ". $y;

        $soccerMatches = SoccerMatche::whereYear('matchDate', $y)->orderBy('matchDate', 'asc')->get();
        
        return view('soccerMatches.index', ['monthYear' => $monthYear, 'soccerMatches' => $soccerMatches, 'm' => $m, 'y' => $y]);
    }

    public function getMatches($month){
        $year = date('Y');

        $matche = SoccerMatche::whereMonth('matchDate', $month)->whereYear('matchDate', $year)->orderBy('matchDate', 'asc')->get();
                
        return response()->json(['success' => true, 'matche' => $matche],200);
        
    }
    
    
    // public function preCreate(){
    //     return view('soccerMatches.create');
    // }
    
    public function store(Request $request){

        $user = auth()->user();

        $arrayDates = explode(',', $request->arrayDates);
        $arrayHours = explode(',', $request->arrayHours);

        $countArrays = count($arrayDates);

        //Checando se alguma data de jogo já foi criada
        for ($i = 0 ; $i < $countArrays ; $i++){
            $check = SoccerMatche::where('matchDate', $arrayDates[$i])->first();
            if ($check){
                $date = $check->matchDate;
            }
        }
        if(isset($date)){
            $partsDate = explode('-', $date);
            toast('Já existe jogo para o dia '.$partsDate[2].'/'.$partsDate[1].'/'.$partsDate[0].', verifique!', 'error');
            return redirect('/soccerMatches/search?month='.$partsDate[1].'&year='.$partsDate[0]);
        }

        for ($i = 0 ; $i < $countArrays ; $i++){
            $soccerMatche = New SoccerMatche;
            $soccerMatche->matchDate = $arrayDates[$i]; 
            $soccerMatche->hour = $arrayHours[$i]; 
            $soccerMatche->userId = $user->id;
      
            $soccerMatche->save();
        }
        toast('Cadastro realizado com sucesso!','success');
        return redirect('/dashboard');
    }

    public function update(Request $request) {
        
        $data = $request->all();

        if($request->matchDate && $request->m == 'k'){
            $check = SoccerMatche::where('matchDate', $request->matchDate)->where('id', '!=', $request->id)->get();
            if($check->count() > 0){
                toast('Já existe jogo com esta data!', 'error');
            return redirect('/soccerMatches/index'); 
            }
        }
     
        SoccerMatche::findOrFail($request->id)->update($data);
  
        if($request->m == 'd'){
            toast('Jogo editado com sucesso!','success');
            return redirect('/dashboard');
        }
        elseif($request->m == 'k'){
            toast('Jogo editado com sucesso!','success');
            return redirect('/edit/'.$request->y);
        }
        else{
            toast('Jogo editado com sucesso!','success');
            return redirect('/soccerMatches/search?month='.$request->m.'&year='.$request->y);
        }
    }

    public function search(Request $request){
        $month = $request->month;
        $year = $request->year;
        
        $soccerMatches = SoccerMatche::whereMonth('matchDate', $month)->whereYear('matchDate', $year)->orderBy('matchDate', 'asc')->get();

        $m = $this->month($month);

        $date = $m ." / ". $year;
        
        if(count($soccerMatches) > 0){
            return view('soccerMatches.searchList', ['soccerMatches' => $soccerMatches, 'date' => $date, 'm' => $month, 'y' => $year]);
        }
        else{
            toast('Não existe nenhum jogo com essa data!','error');
            return redirect('/soccerMatches/index'); 
        }
    }

    public function month($month){
        if($month == 1){$month = "Janeiro";}
        elseif ($month == 2){$month = "Fevereiro";}
        elseif ($month == 3){$month = "Março";}
        elseif ($month == 4){$month = "Abril";}
        elseif ($month == 5){$month = "Maio";}
        elseif ($month == 6){$month = "Junho";}
        elseif ($month == 7){$month = "Julho";}
        elseif ($month == 8){$month = "Agosto";}
        elseif ($month == 9){$month = "Setembro";}
        elseif ($month == 10){$month = "Outubro";}
        elseif ($month == 11){$month = "Novembro";}
        else {$month = "Dezembro";} 

        return $month;
    }
    
    public function checkDate($matchDate){
        $date = SoccerMatche::where('matchDate', $matchDate)->get();
        
        if($date->count() > 0){
            return response()->json(['success' => true]);
        }
        else{
            return response()->json(['success' => false]);
        }
    }

    public function edit($id){
        $sum = 0;
    
        $soccerMatches = SoccerMatche::where('id', $id)->get();
        $goalsAthletes = GoalsAthletes::where('soccerMatchId', $id)->get();

        foreach ($goalsAthletes as $goal){
            $sum += $goal->goals;
        }
      
       return view('soccerMatches.edit', ['soccerMatches' => $soccerMatches, 'goals' => $sum]);    
    }

    public function goalsAgainst(Request $request) {
        $soccerMatchId = $request->soccerMatchId;
        $goals = $request->goalsAgainst;

        // Guardando gols do adversário na tabela jogos. (passar para inglês).
        $soccerMatche = SoccerMatche::find($soccerMatchId);
        $soccerMatche->goalsAgainst = $goals;
        $soccerMatche->save();
                
        toast('Dados salvos com sucesso!', 'success');
        return redirect('/edit/'.$request->soccerMatchId);
    }

    public function goals(Request $req){
        $user = auth()->user();

        $id = $req->soccerMatchId;
        $arrayA = explode(',', $req->arrayA);
        $arrayG = explode(',', $req->arrayG);

        $countArrays = count($arrayA);
        
        // Salvando os gols feitos por cada jogados no jogo na tabela GoalsAthletes
        for ($i = 0 ; $i < $countArrays ; $i++){
            $input = New GoalsAthletes;
            $input->userId = $user->id;
            $input->soccerMatchId = $id;
            $input->athleteId = $arrayA[$i];
            $input->goals = $arrayG[$i];
            $input->save();
        }
      
        toast('Cadastro realizado com sucesso!','success');
        return redirect('/edit/'.$req->soccerMatchId);
    }

    public function destroy($id) {
        $user = auth()->user();

        GoalsAthletes::where('soccerMatchId',$id)->delete();

        SoccerMatche::findOrFail($id)->delete();
        
        $y = date('Y');
        $soccerMatches = SoccerMatche::whereYear('matchDate', $y)->orderBy('matchDate', 'asc')->get();

        toast('Jogo excluido com sucesso!', 'success');
        return view('soccerMatches.index', ['soccerMatches' => $soccerMatches]);
    }
 
}
