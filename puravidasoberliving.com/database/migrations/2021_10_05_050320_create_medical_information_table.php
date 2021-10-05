<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->boolean('hasScripts')->nullable();
            $table->string('medications', 5000)->nullable();
            $table->string('drugUse', 5000)->nullable();
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('rental_applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_information');
    }
}
