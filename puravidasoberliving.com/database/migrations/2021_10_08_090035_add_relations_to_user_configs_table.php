<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToUserConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_configs', function (Blueprint $table) {
            $table->foreign('user_type_code')->references('user_type_code')->on('user_types');
            $table->foreign('user_permission_code')->references('user_permission_code')->on('user_permissions');
            $table->foreign('country_code')->references('country_code')->on('country_codes');
            $table->foreign('state_code')->references('state_code')->on('state_codes');
            $table->foreign('rental_team_code')->references('rental_team_code')->on('rental_teams');
            $table->foreign('theme_code')->references('theme_code')->on('application_themes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_configs', function (Blueprint $table) {
            //
        });
    }
}