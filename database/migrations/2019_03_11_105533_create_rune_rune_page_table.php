<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuneRunePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rune_runePage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rune_id')->unsigned();
            $table->integer('runePage_id')->unsigned();
            $table->unique('rune_id', 'runePage_id');
            $table->foreign('rune_id')->references('id')->on('rune');
            $table->foreign('runePage_id')->references('id')->on('runePage');
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
        Schema::dropIfExists('rune_runePage');
    }
}
