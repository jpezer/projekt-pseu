<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudijPredmet extends Model
{
    protected $table='studiji_predmeti';
    protected $fillable=['studij_id','predmet_id'];
}
