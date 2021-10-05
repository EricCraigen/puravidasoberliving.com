<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->boolean('isSexOffender')->nullable();
            $table->boolean('isArsonist')->nullable();
            $table->boolean('isKidnapper')->nullable();
            $table->boolean('onLegalSupervision')->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 150)->nullable();
            $table->string('agency', 150)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('convictions', 5000)->nullable();
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
        Schema::dropIfExists('legal_information');
    }
}
