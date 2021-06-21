<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use App\Studij;
use App\Predmet;
use App\StudijPredmet;

class StraniceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function prikazi_okvir()
    {
        return view('stranice.okvir');
    }

    public function prikazi_informacije()
    {
        $studiji = Studij::all()->sortBy('nazivStudija');

        $data=DB::table('studiji')
            ->join('studiji_predmeti','studiji.id','=','studiji_predmeti.studij_id')
            ->join('predmeti','studiji_predmeti.predmet_id','=','predmeti.id')
            ->select('studiji.nazivStudija','predmeti.naziv')
            ->get();

            return view('stranice.informacije')->with('data',$data)->with('studiji',$studiji);
    }

    public function welcome_page()
    {
        return view('welcome');
    }
}
