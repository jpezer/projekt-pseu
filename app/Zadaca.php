<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zadaca extends Model
{
    protected $table='zadace';
    protected $fillable=['opis','name','file_path','korisnik_id','vrijeme_predaje'];

    public function korisnik(){
        return $this->belongsTo('App\User','korisnik_id');

    }

    public function predmet(){
        return $this->belongsToMany('App\Predmet','zadace_predmeti','zadaca_id','predmet_id');
    }

}
