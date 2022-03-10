<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOpinionsToRecepieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepies', function (Blueprint $table) {
            $table-> integer('taste');
            $table-> integer('speed');
            $table-> integer('price'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recepies', function (Blueprint $table) {
            //
        });
    }
}
