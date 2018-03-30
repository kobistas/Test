<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->integer('isAdmin')->default("0");
          $table->integer('isModerator')->default("0");
          $table->integer('fifaPoints')->default("0");
          $table->integer('fifaPlayed')->default("0");
          $table->integer('fifaWon')->default("0");
          $table->integer('fifaLost')->default("0");
          $table->integer('fifaDraw')->default("0");
          $table->integer('fifaScored')->default("0");
          $table->integer('fifaMissed')->default("0");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
