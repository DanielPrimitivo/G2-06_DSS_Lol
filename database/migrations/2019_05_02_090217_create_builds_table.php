<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_rune_id');
            $table->integer('object_name');
            $table->integer('champion_name');
            $table->integer('spell_name');
            $table->foreign('page_rune_id')->references('id')->on('rune_runePage');
            $table->foreign('object_name')->references('name')->on('objects');
            $table->foreign('champion_name')->references('name')->on('champions');
            $table->foreign('spell_name')->references('name')->on('spells');
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
        Schema::dropIfExists('builds');
    }
}
