<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuZadacePredmeti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadace_predmeti', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('zadaca_id')->unsigned();
            $table->bigInteger('predmet_id')->unsigned();
            $table->timestamps();

            $table->foreign('zadaca_id')->references('id')->on('zadace')->onDelete('cascade');
            $table->foreign('predmet_id')->references('id')->on('predmeti')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zadace_predmeti');
    }
}
