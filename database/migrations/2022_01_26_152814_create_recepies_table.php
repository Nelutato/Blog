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
            $table-> unsignedBiginteger('admin_id');
            $table-> text('body');
            $table-> text('title');
            $table-> text('ingredients');
            $table->string ('image');
            $table->timestamps();
            $table-> foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade');
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
