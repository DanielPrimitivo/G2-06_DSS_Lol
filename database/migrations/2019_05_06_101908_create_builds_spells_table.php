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
        Schema::create('build_spell', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spell_id');
            $table->integer('build_id');
            $table->foreign('spell_id')->references('id')->on('spells')->onDelete('cascade');
            $table->foreign('build_id')->references('id')->on('builds')->onDelete('cascade');
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
        Schema::dropIfExists('build_spell');
    }
}
