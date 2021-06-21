<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZadacaPredmet extends Model
{
    protected $table='zadace_predmeti';
    protected $fillable=['zadaca_id','predmet_id'];
}
