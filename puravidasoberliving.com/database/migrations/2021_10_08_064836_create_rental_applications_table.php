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
            $table->bigIncrements('application_id')->index();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('personal_info_id')->index()->nullable();
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
