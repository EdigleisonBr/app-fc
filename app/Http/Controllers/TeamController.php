<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class TeamController extends Controller
{
    public function index(){
        
        $teams = Team::all();
               
        return view('teams.index', compact('teams'));
    }

    public function create(){

        return view('teams.create');

    }

    public function store(Request $request) {

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return back()->with('toast_error', 'Insira um nome!');
        // }

        $team = new Team;

        $team->name = $request->name;
        $team->responsible = $request->responsible;
        $team->cell = $request->cell;
           
        $user = auth()->user();
        
        $team->userId = $user->id;

        $team->save();

        toast('Cadastro realizado com sucesso!','success');
        return redirect('/teams/index');
    }

    public function edit($id){
        $user = auth()->user();

        $team = Team::findOrFail($id);

        return view('teams.edit', ['team' => $team]);
    }

    public function update(Request $request){
        $data = $request->all();

        Team::findOrFail($request->id)->update($data);

        toast('Cadastro editado com sucesso!','success');
        return redirect('teams/index');
    }

    public function show($id) {
        $user = auth()->user();    

        $team = Team::findOrFail($id);

        return view('teams.show', ['team' => $team]);
    }

    public function destroy($id) {
        $user = auth()->user();  
        
        Team::findOrFail($id)->delete();
        
        toast('Cadastro excluido com sucesso!','success');
        return redirect('/teams/index');
        
    }
    
}
