<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\GoalsAthletes;
use App\Models\SoccerMatche;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){
        //return current month
        $now = Carbon::now();
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        $month = ucfirst(utf8_encode(strftime("%B", strtotime($now))));

        // return schedules dates
        $today = date('m');
        $soccerMatches = SoccerMatche::whereMonth('matchDate', $today)->orderBy('matchDate', 'asc')->get();

        $id = 0;
        foreach ($soccerMatches as $teste){
            $id = $teste->id;
        }

        $sum = 0;
        $goalsAthletes = GoalsAthletes::where('soccerMatchId', $id)->get();
        foreach ($goalsAthletes as $goal){
            $sum += $goal->goals;
        }

        // Artilheiro
        $gunner = GoalsAthletes::select(
            [
                'athleteId',
                DB::raw("sum(goals) AS goal")
            ]
        )->groupBy('athleteId')
        ->orderBy('goal', 'DESC')
        ->get();

        // Gols a Favor
        $goalsInFavor = DB::table('goals_athletes')->get()->sum('goals');

        // Gols contra
        $goalsAgainst = DB::table('soccer_matches')->get()->sum('goalsAgainst');

        // Quantidade de Jogos
        $countMatches = DB::table('soccer_matches')->where('matchDate', '<', $now)->get()->count('id');

        $athletes = DB::table('athletes')->whereMonth('birthName', $today)->orderBy('birthName', 'ASC')->get();

        return view('layouts.dashboard', [
            'month' => $month, 
            'today' => $today, 
            'soccerMatches' => $soccerMatches, 
            'goals' => $sum, 
            'gunner' => $gunner, 
            'goalsInFavor' => $goalsInFavor,
            'goalsAgainst' => $goalsAgainst,
            'countMatches' => $countMatches,
            'athletes' => $athletes
        ]);
    }
}
