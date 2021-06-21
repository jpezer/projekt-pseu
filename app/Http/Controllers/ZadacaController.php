<?php

namespace App\Http\Controllers;

use App\Zadaca;
use App\Predmet;
use App\Studij;
use App\ZadacaPredmet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Response;


class ZadacaController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeworks(){

        $user=Auth::user()->name;
        
        $userHomeworks=DB::table('users')
            ->join('zadace','users.id','=','zadace.korisnik_id')
            ->join('zadace_predmeti','zadace.id','=','zadace_predmeti.zadaca_id')
            ->join('predmeti','zadace_predmeti.predmet_id','=','predmeti.id')
            ->join('studiji_predmeti','predmeti.id','=','studiji_predmeti.predmet_id')
            ->join('studiji','studiji_predmeti.studij_id','=','studiji.id')
            ->select('users.name','studiji.nazivStudija','predmeti.naziv','zadace.opis','zadace.file_path','zadace.id','zadace.vrijeme_predaje')
            ->where('users.name', $user)
            ->orderBy('zadace.vrijeme_predaje','asc')
            ->get();

        return view('stranice.moje_zadace')->with('userHomeworks',$userHomeworks);

    }

    public function index(){
    
        if(Auth::user()->type!='admin'){
            abort(403);
        }
        $data=DB::table('users')
            ->join('zadace','users.id','=','zadace.korisnik_id')
            ->join('zadace_predmeti','zadace.id','=','zadace_predmeti.zadaca_id')
            ->join('predmeti','zadace_predmeti.predmet_id','=','predmeti.id')
            ->join('studiji_predmeti','predmeti.id','=','studiji_predmeti.predmet_id')
            ->join('studiji','studiji_predmeti.studij_id','=','studiji.id')
            ->select('users.name','studiji.nazivStudija','predmeti.naziv','zadace.opis','zadace.file_path','zadace.id','zadace.vrijeme_predaje')
            ->orderBy('zadace.vrijeme_predaje','asc')
            ->get();

            return view('stranice.pregled_zadaca')->with('data',$data);

    }

    public function create_form(){
        $predmeti=Predmet::get();
        $studiji=Studij::get();
        return view('stranice.dodaj_zadacu')->with('predmeti',$predmeti)->with('studiji',$studiji);
    }

    public function edit_form(Request $request,$id){
        $studij=Studij::find($id);
        return view('stranice.uredi_studij')->with('studij',$studij);
    }

    public function create(Request $request){
        //$zadace=Zadaca::all();
        $request->validate(['file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx|max:2048']);
    
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('',$fileName);
       
        $zadaca=new Zadaca();
            $zadaca->name = time().'_'.$request->file->getClientOriginalName();
            $zadaca->file_path =$filePath;
            $zadaca->opis=$request->opis;
            $zadaca->korisnik_id=Auth::user()->id;
            $zadaca->vrijeme_predaje=Carbon::now()->setTimezone('Europe/Sarajevo');
            $zadaca->save();
            $zadaca->fresh();

        $zadaca_predmet=new ZadacaPredmet();
            $zadaca_predmet->predmet_id=$request->predmet;
            $zadaca_predmet->zadaca_id=$zadaca->id;
            $zadaca_predmet->save();
        
        if(Auth::user()->type=='admin'){
            return redirect(route('stranice.pregled_zadaca'));//->with('zadace',$zadace);
        }else{
            return redirect(route('stranice.moje_zadace'));
        }
       
    }

    public static function uploadFile(Request $request, $keep_name = false){
        $file = $request->file('file');

        if ($keep_name) {
            if (!$filename = self::saveFileToStorage($file, $file->getClientOriginalName())) {
                $parts = explode('.', $file->getClientOriginalName());
    
                $filename = self::saveFileToStorage($file, ($keep_name ? $parts[0] . '_' : '') . time() . '.' . $file->getClientOriginalExtension());
            }
        } else {
            $filename = self::saveFileToStorage($file, time() . '.' . $file->getClientOriginalExtension());
        }
    
        if ($filename == null && !$filename = self::saveFileToStorage($file, time() . '_' . rand(10, 10 ** 6) . '.' . $file->getClientOriginalExtension())) {
            abort(484, 'Ne mogu pohraniti datoteku s tim imenom! Molimo preimenujte je.');
        }
    
        return $filename;

    }

    public static function saveFileToStorage($file, $filename){
        if (file_exists(storage_path() . '/app/uploads/' . $filename))
            return null;

        $file->move(storage_path() . '/app/uploads/', $filename);

        return $filename;
        }

    public function delete(Request $request,$id){
        $zadaca=Zadaca::find($id);
        $zadaca->forceDelete();

        if(Auth::user()->type=='admin'){
            return redirect(route('stranice.pregled_zadaca'));//->with('zadace',$zadace);
        }else{
            return redirect(route('stranice.moje_zadace'));
        }
    
    }

    public function download($filename){
        $path = storage_path('app/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    }
}
