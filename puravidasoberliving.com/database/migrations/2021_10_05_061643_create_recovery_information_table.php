<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoveryInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovery_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->string('txtGoingWell', 5000)->nullable();
            $table->string('txtGoingBad', 5000)->nullable();
            $table->string('txtHopesGoals', 5000)->nullable();
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
        Schema::dropIfExists('recovery_information');
    }
}
