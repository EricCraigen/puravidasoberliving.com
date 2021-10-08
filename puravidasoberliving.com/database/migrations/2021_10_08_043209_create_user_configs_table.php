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
            $table->unsignedBigInteger('user_config_id')->index();
            $table->unsignedBigInteger('user_type_code');
            $table->unsignedBigInteger('user_permission_code');
            $table->unsignedBigInteger('country_code');
            $table->unsignedBigInteger('state_code');
            $table->unsignedBigInteger('rental_team_code');
            $table->unsignedBigInteger('theme_code');
            $table->timestamps();

            $table->foreign('user_config_id')->references('id')->on('users');
            // $table->foreign('user_type_code')->references('user_type_code')->on('user_types');
            // $table->foreign('user_type_code')->references('user_type_code')->on('user_type_codes');
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