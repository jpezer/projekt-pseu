<?php

namespace App\Http\Controllers;

use App\Predmet;
use App\Studij;
use App\StudijPredmet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredmetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->type != 'admin'){
            abort(403);
        }
        $predmeti=Predmet::all();
        return view('stranice.pregled_predmeta')->with('predmeti',$predmeti);
    }

    public function create_form(){
        if(Auth::user()->type != 'admin'){
            abort(403);
        }
        $studiji=Studij::all();
        return view('stranice.dodaj_predmet')->with('studiji',$studiji);
    }

    public function edit_form(Request $request,$id){
        $predmeti=Predmet::find($id);
        return view('stranice.uredi_predmet')->with('predmet',$predmeti);
    }

    public function create(Request $request){
        $predmet=new Predmet;
        $predmet->naziv=$request->naziv;
        $predmet->save();
        $predmet->fresh();

        $studijPredmet=new StudijPredmet();
        $studijPredmet->studij_id=$request->studij;
        $studijPredmet->predmet_id=$predmet->id;
        $studijPredmet->save();

       return redirect(route('stranice.pregled_predmeta'));
    }
    
    public function edit(Request $request,$id){
        $predmet=Predmet::find($id);
        $predmet->naziv=$request->naziv;
        $predmet->save();

        return redirect(route('stranice.pregled_predmeta'));

    }
    public function delete(Request $request,$id){
        $predmet=Predmet::find($id);
        $predmet->forceDelete();

        return redirect(route('stranice.pregled_predmeta'));
    
    }  
}
