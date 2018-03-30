<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('teams', function (Blueprint $table) {
          $table->increments('id');
          $table->string('team_name')->unique();
          $table->integer('team_id')->unsigned();
          $table->integer('played')->default('0');
          $table->integer('win')->default('0');
          $table->integer('draw')->default('0');
          $table->integer('lose')->default('0');
          $table->integer('scored')->default('0');
          $table->integer('missed')->default('0');
          $table->integer('total_points')->default('0');

          $table->timestamps();
          $table->foreign('team_id')->references('id')->on('users');


      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
