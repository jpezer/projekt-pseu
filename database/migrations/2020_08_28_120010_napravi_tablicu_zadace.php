<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuZadace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadace', function (Blueprint $table) {
            $table->id();
            $table->string('opis');
            $table->string('name')->nullable();
            $table->string('file_path')->nullable();
            $table->bigInteger('korisnik_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('korisnik_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zadace');
    }
}
