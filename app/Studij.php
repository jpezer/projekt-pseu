<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studij extends Model
{
    protected $table='studiji';
    protected $fillable=['nazivStudija','opis'];
}
