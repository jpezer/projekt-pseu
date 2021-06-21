<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predmet extends Model
{
    protected $table='predmeti';
    protected $fillable=['naziv'];
}
