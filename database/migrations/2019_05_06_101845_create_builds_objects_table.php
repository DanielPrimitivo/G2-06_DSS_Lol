<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildsObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds_objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id');
            $table->integer('build_id');
            $table->foreign('object_id')->references('id')->on('objects');
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
        Schema::dropIfExists('builds_users');
    }
}
