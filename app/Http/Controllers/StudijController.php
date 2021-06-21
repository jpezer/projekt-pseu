<?php

namespace App\Http\Controllers;

use App\Studij;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudijController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->type != 'admin'){
            abort(403);
        }
        $studiji=Studij::all();
        return view('stranice.pregled_studija')->with('studiji',$studiji);
    }

    public function create_form(){
        if(Auth::user()->type != 'admin'){
            abort(403);
        }
        return view('stranice.dodaj_studij');
    }

    public function edit_form(Request $request,$id){
        $studij=Studij::find($id);
        return view('stranice.uredi_studij')->with('studij',$studij);
    }

    public function create(Request $request){
        $studij=new Studij;
        $studij->nazivStudija=$request->nazivStudija;
        $studij->opis=$request->opis;
        $studij->save();

        return redirect(route('stranice.pregled_studija')); 

    }
    public function edit(Request $request,$id){
        $studij=Studij::find($id);
        $studij->nazivStudija=$request->nazivStudija;
        $studij->opis=$request->opis;
        $studij->save();

        return redirect(route('stranice.pregled_studija'));

    }
    public function delete(Request $request,$id){
        $studij=Studij::find($id);
        $studij->forceDelete();

        return redirect(route('stranice.pregled_studija'));
    
    }
}
