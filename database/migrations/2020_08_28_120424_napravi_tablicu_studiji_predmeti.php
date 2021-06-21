<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuStudijiPredmeti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studiji_predmeti', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('studij_id')->unsigned();
            $table->bigInteger('predmet_id')->unsigned();
            $table->timestamps();

            $table->foreign('studij_id')->references('id')->on('studiji')->onDelete('cascade');
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
        Schema::dropIfExists('studiji_predmeti');
    }
}
