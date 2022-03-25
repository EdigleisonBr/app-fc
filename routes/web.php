<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Importando Controllers

//use App\Http\Controllers\AthletesController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SoccerMatcheController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\GoalsAthleteController;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');


Route::get('/athletes/create', [AthleteController::class, 'create'])->middleware('auth');
Route::post('/athletes', [AthleteController::class, 'store'])->middleware('auth');
Route::get('/athletes/index', [AthleteController::class, 'index'])->middleware('auth');
Route::get('/athletes/edit/{id}', [AthleteController::class, 'edit'])->middleware('auth');
Route::put('/athletes/update/{id}', [AthleteController::class, 'update'])->middleware('auth');
Route::get('/athletes/show/{id}', [AthleteController::class, 'show'])->middleware('auth');
Route::delete('/athletes/{id}', [AthleteController::class, 'destroy'])->middleware('auth');

Route::get('/teams/create', [TeamController::class, 'create'])->middleware('auth');
Route::post('/teams', [TeamController::class, 'store'])->middleware('auth');
Route::get('/teams/index', [TeamController::class, 'index'])->middleware('auth');
Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->middleware('auth');
Route::put('/teams/update/{id}', [TeamController::class, 'update'])->middleware('auth');
Route::get('/teams/show/{id}', [TeamController::class, 'show'])->middleware('auth');
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->middleware('auth');

Route::get('/referees/create', [RefereeController::class, 'create'])->middleware('auth');
Route::post('/referees', [RefereeController::class, 'store'])->middleware('auth');
Route::get('/referees/index', [RefereeController::class, 'index'])->middleware('auth');
Route::get('/referees/edit/{id}', [RefereeController::class, 'edit'])->middleware('auth');
Route::put('/referees/update/{id}', [RefereeController::class, 'update'])->middleware('auth');
Route::get('/referees/show/{id}', [RefereeController::class, 'show'])->middleware('auth');
Route::delete('/referees/{id}', [RefereeController::class, 'destroy'])->middleware('auth');

Route::get('/places/create', [PlaceController::class, 'create'])->middleware('auth');
Route::post('/places', [PlaceController::class, 'store'])->middleware('auth');
Route::get('/places/index', [PlaceController::class, 'index'])->middleware('auth');
Route::get('/places/edit/{id}', [PlaceController::class, 'edit'])->middleware('auth');
Route::put('/places/update/{id}', [PlaceController::class, 'update'])->middleware('auth');
Route::get('/places/show/{id}', [PlaceController::class, 'show'])->middleware('auth');
Route::delete('/places/{id}', [PlaceController::class, 'destroy'])->middleware('auth');

Route::get('/schedules/create', [ScheduleController::class, 'create'])->middleware('auth');
Route::post('/schedules', [ScheduleController::class, 'store'])->middleware('auth');
Route::get('/schedules/search', [ScheduleController::class, 'search'])->middleware('auth');
Route::get('/schedules/index', [ScheduleController::class, 'index'])->middleware('auth');


Route::post('/soccerMatches', [SoccerMatcheController::class, 'store'])->middleware('auth');
Route::get('/soccerMatches/index', [SoccerMatcheController::class, 'index'])->middleware('auth');
Route::put('/soccerMatches/update/{id}', [SoccerMatcheController::class, 'update'])->middleware('auth');
// Cria os dados iniciais do jogo (data e hora)
// Route::get('/soccerMatches/pre-create', [SoccerMatcheController::class, 'preCreate'])->middleware('auth');
// Lista o jogo pela data e ano escolhido pelo usuário
Route::get('/soccerMatches/search', [SoccerMatcheController::class, 'search'])->middleware('auth');
// Carrega os jogos
Route::get('/soccerMatches/getMatches/{month}', [SoccerMatcheController::class, 'getMatches'])->middleware('auth');
// Checa se já existe jogo com mesma data
Route::get('/soccerMatches/checkDate/{date}', [SoccerMatcheController::class, 'checkDate'])->middleware('auth');
// carrega os dados do jogo
Route::get('/edit/{id}', [SoccerMatcheController::class, 'edit'])->middleware('auth');
// Salva os gols que o time levou
Route::get('/goalsAgainst', [SoccerMatcheController::class, 'goalsAgainst'])->middleware('auth');
Route::get('soccerMatches/goals', [SoccerMatcheController::class, 'goals'])->middleware('auth');
Route::get('soccerMatches/delete/{id}', [SoccerMatcheController::class, 'destroy'])->middleware('auth');


Route::post('/goals', [GoalsAthleteController::class, 'store'])->middleware('auth');

Route::get('/goals/delete/{id}', [GoalsAthleteController::class, 'destroy'])->middleware('auth');

Route::get('/goals/edit/{id}', [GoalsAthleteController::class, 'edit'])->middleware('auth');

Route::get('/athletes/json', [AthleteController::class, 'searchAthetes']);

Route::get('/soccerMatches/teste', [SoccerMatcheController::class, 'teste'])->middleware('auth');








