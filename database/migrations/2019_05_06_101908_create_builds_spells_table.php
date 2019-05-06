<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildsSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds_spells', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spell_id');
            $table->integer('build_id');
            $table->foreign('spell_id')->references('id')->on('spells');
            $table->foreign('build_id')->references('id')->on('builds');
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
        Schema::dropIfExists('builds_spells');
    }
}
