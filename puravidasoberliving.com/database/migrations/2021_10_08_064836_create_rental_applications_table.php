<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned()->default(1);
            $table->integer('user_id')->unsigned()->default(1);
            $table->integer('personal_info_id')->unsigned()->default(1);
            $table->string('session_id')->unique()->index();
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
        Schema::dropIfExists('rental_applications');
    }
}