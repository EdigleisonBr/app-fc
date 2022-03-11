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

class GoalsAthleteController extends Controller
{
    public function index($id){
        $soccerMatches = SoccerMatche::where('id', $id)->get();
        return view('goals.index', ['soccerMatches' => $soccerMatches]);  
    }

    public function store(Request $request){
        $athlete = $request->athleteId;
        $goals = $request->goals;
        $goalsAgainst = $request->goalsAgainst;
        $id = $request->soccerMatcheId;

        toast('Cadastro realizado com sucesso!','success');
        return redirect('/goals/edit/'.$id);
    }
        
    public function edit($id) {

        $goals = GoalsAthletes::findOrFail($id);
        $soccerMatches = $id->soccerMatchId;
        
        return view('goals.edit', ['goals' => $goals, 'soccerMatches' => $soccerMatches]);
    }

    public function destroy($id){
        $goalAthlete = GoalsAthletes::findOrFail($id);
        $id = $goalAthlete->id;

        return response()->json(['id' => $id]);
    }

}



