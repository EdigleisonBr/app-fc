<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function search(){
        return view('schedules.search');
    }
    public function index(Request $request){
        $month = $request->month;
        $year = $request->year;
        
        $scheduleDates = Schedule::whereMonth('gameDate', $month)->whereYear('gameDate', $year)->orderBy('gameDate', 'asc')->get();
        
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        $date = ucfirst(utf8_encode( strftime("%B / %Y", strtotime($year) ) ) );
        
        if(count($scheduleDates) > 0){
            return view('schedules.index', ['scheduleDates' => $scheduleDates, 'date' => $date]);
        }
        else{
            toast('Nenhuma agenda localizada com essa data!','warning');
            return redirect('/schedules/search'); 
        }
    }

    public function create(){
        return view('schedules.create');
    }
    
    public function store(Request $request){

        $user = auth()->user();

        $arrayDates = explode(',', $request->arrayDates);
        $arrayHours = explode(',', $request->arrayHours);

        $countArrays = count($arrayDates);

        for ($i = 0 ; $i < $countArrays ; $i++){
            $schedule = New Schedule;
            $schedule->gameDate = $arrayDates[$i]; 
            $schedule->hour = $arrayHours[$i]; 
            $schedule->userId = $user->id;
      
            $schedule->save();
        }
        

        toast('Cadastro realizado com sucesso!','success');
        return redirect('/dashboard');
    }

}
