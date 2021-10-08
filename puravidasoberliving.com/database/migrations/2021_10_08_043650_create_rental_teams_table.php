<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_teams', function (Blueprint $table) {
            $table->bigIncrements('rental_team_code')->index();
            $table->unsignedBigInteger('house_id');
            $table->string('name');
            $table->timestamps();

            // $table->foreign('rental_team_code')->references('rental_team_code')->on('user_configs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_teams');
    }
}