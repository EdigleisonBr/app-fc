<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Athlete;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AthleteController extends Controller
{

    public function index(){
        $search = request('search'); 

        if($search){
            $athletes = Athlete::where(['name', 'like', '%'.$search.'%'])->get();
        }else{ 
            $athletes = Athlete::where('active', 1)->orderBy('name')->get();
        }  
        
        return view('athletes.index', compact('athletes', 'search'));
    }

    public function create(){

        return view('athletes.create');

    }

    public function store(Request $request) {

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return back()->with('toast_error', 'Insira um nome!');
        // }

        $athlete = new Athlete;

        $athlete->name = $request->name;
        $athlete->surname = $request->surname;    
        $athlete->position = $request->position;    
        $athlete->birthName = $request->birthName;   
        $athlete->zipCode = $request->zipCode;    
        $athlete->address = $request->address;    
        $athlete->number = $request->number;    
        $athlete->neighborhood = $request->neighborhood;    
        $athlete->city = $request->city;    
        $athlete->state = $request->state;    
        $athlete->shoeSize = $request->shoeSize;    
        $athlete->cell = $request->cell; 

        if ($request->active){
            $athlete->active = $request->active;
        }
        
        $user = auth()->user();
        $athlete->userId = $user->id;

        $athlete->save();

        toast('Cadastro realizado com sucesso!','success');
        return redirect('/athletes/index');
    }

    public function edit($id) {

        $user = auth()->user();

        $athlete = Athlete::findOrFail($id);

        // birth date calculation
        $age = $this->ageCalculation($athlete->birthName);
        
        return view('athletes.edit', ['athlete' => $athlete, 'age' => $age]);
    }

    public function update(Request $request) {

        $data = $request->all();

        //Image upload
        // if($request->hasFile('image') && $request->file('image')->isValid()) {

        //     $requestImage = $request->image;
            
        //     $extension  = $requestImage->extension();
  
        //     $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
  
        //     $requestImage->move(public_path('img/events'), $imageName);
  
        //     $data['image'] = $imageName;
        // }

        $data['active'] = isset($request->active) ? true : false;
                     
        Athlete::findOrFail($request->id)->update($data);

        toast('Cadastro editado com sucesso!','success');
        return redirect('/athletes/index');
    }

    public function show($id) {
           
        $athlete = Athlete::findOrFail($id);

        $user = auth()->user();

        // birth date calculation
        $age = $this->ageCalculation($athlete->birthName);

        return view('athletes.show', ['athlete' => $athlete, 'age' => $age]);
    }

    public function destroy($id) {
           
        Athlete::findOrFail($id)->delete();
        $user = auth()->user();
        toast('Cadastro excluido com sucesso!','success');
        return redirect('/athletes/index');
        
    }

    public function ageCalculation($yearBirth) {
           
        // birth date calculation
        $now = date('Y');
        $partOne = explode("-", $yearBirth);
        $year = $partOne[0];
        $age = $now - $year;

        return $age;
        
    }

    public function searchAthetes(){
        $athletes = Athlete::paginate(3);
        return $athletes;
    }
}
