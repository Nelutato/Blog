<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultToRecepies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepies', function (Blueprint $table) {
            $table
                ->string('image')
                ->default('empty')
                ->change();
            $table
                ->integer('taste')
                ->default(0)
                ->change();
            $table
                ->integer('speed')
                ->default(0)
                ->change();
            $table
                ->integer('price')
                ->default(0)
                ->change();
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
            $table->string('image')->default('empty')->change;
            $table
                ->integer('taste')
                ->default(null)
                ->change();
            $table
                ->integer('speed')
                ->default(null)
                ->change();
            $table
                ->integer('price')
                ->default(null)
                ->change();
        });
    }
}
