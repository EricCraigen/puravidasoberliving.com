<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_information_id')->nullable();
            // $table->string('session_id')->unique()->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('middleInitial', 1)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->date('dob', 255)->nullable();
            $table->string('ssn', 9)->nullable();
            $table->string('phone', 16)->nullable();
            $table->timestamps();

            $table->foreign('personal_information_id')->references('id')->on('rental_applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_information');
    }
}
