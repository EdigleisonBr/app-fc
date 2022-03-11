<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Referee;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class RefereeController extends Controller
{
    public function index(){
        $referees = Referee::all();
        return view('referees.index', compact('referees'));
    }

    public function create(){
        return view('referees.create');
    }

    public function store(Request $request){
        $referee = new Referee;

        $referee->name = $request->name;
        $referee->surname = $request->surname;
        $referee->cell = $request->cell;

        $user = auth()->user();

        $referee->userId = $user->id;

        $referee->save();

        toast('Cadastro realizado com sucesso!','success');
        return redirect('/referees/index');
    }

    public function edit($id){
        $user = auth()->user();

        $referee = Referee::findOrFail($id);

        return view('referees.edit', ['referee' => $referee]);
    }

    public function update(Request $request){
        $user = auth()->user();

        $data = $request->all();

        Referee::findOrFail($request->id)->update($data);

        toast('Cadastro editado com sucesso!','success');
        return redirect('referees/index');
    }

    public function show($id){
        $user = auth()->user();

        $referee = Referee::findOrFail($id);

        return view('referees.show', ['referee' => $referee]);
    }

    public function destroy($id){
        $user = auth()->user();

        Referee::findOrFail($id)->delete();
        
        toast('Cadastro excluido com sucesso!','success');
        return redirect('/referees/index');
    }
    public function searchReferees(){
        $results = Referee::all();
        return $results->paginate();
    }
}
