<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    public function create(){
        return view('places.create');
    }

    public function store(Request $request){
        $place = new Place;
        $user = auth()->user();

        $place->name = $request->name;
               
        $place->save();

        toast('Cadastro realizado com sucesso!','success');
        return redirect('/places/index');
    }

    public function edit($id){
        $user->auth()->user();

        $place = Place::findOrFail($id);

        return view('places.edit', ['place' => $place]);
    }

    public function update(Request $request){
        $user = auth()->user();

        $data = $request->all();

        Place::findOrFail($request->id)->update($data);

        toast('Cadastro editado com sucesso!','success');
        return redirect('places/index');
    }

    public function show($id){
        $user = auth()->user();

        $place = Place::findOrFail($id);

        return view('places.show', ['referee' => $referee]);
    }

    public function destroy($id){
        $user = auth()->user();

        Place::findOrFail($id)->delete();
        
        toast('Cadastro excluido com sucesso!','success');
        return redirect('/places/index');
    }
}