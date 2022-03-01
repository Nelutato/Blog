<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepieEditedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepie_editeds', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger('recepieBelongs');
            $table-> unsignedBigInteger('recepieUser');
            $table-> text('ingredients');
            $table-> text('Body');
            $table-> integer('taste');
            $table-> integer('speed');
            $table-> integer('price'); 
            $table-> text('photo');
            $table->timestamps();
            $table->foreign('recepieBelongs')->references('id')->on('recepies')->onDelete('cascade');
            $table->foreign('recepieUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepie_editeds');
    }
}
