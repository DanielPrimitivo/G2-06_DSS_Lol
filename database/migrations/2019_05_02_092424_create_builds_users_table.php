<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('build_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('build_id')->references('id')->on('build');
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
