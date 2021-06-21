<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmjeniTablicuStudiji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studiji', function (Blueprint $table) {
            $table->dropColumn('naziv');
            $table->string('nazivStudija');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studiji', function (Blueprint $table) {
            //
        });
    }
}
