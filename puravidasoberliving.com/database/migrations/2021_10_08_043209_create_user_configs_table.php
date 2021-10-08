<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->default(1);
            $table->integer('user_type_id')->unsigned()->default(1);
            $table->integer('user_permission_id')->unsigned()->default(1);
            $table->integer('country_id')->unsigned()->default(1);
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('rental_team_id')->unsigned()->default(1);
            $table->integer('theme_id')->unsigned()->default(1);
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
        Schema::dropIfExists('user_configs');
    }
}
