<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepies', function (Blueprint $table) {
            $table->id();
            $table-> foreignId('user_id')->constrained('users');
            $table-> unsignedBiginteger('primary');
            $table-> text('body');
            $table-> text('title');
            $table-> text('ingredients');
            $table->string ('image');
            $table-> integer('taste');
            $table-> integer('speed');
            $table-> integer('price'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepies');
    }
}
