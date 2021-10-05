<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funding_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->boolean('hasLivedWithPVSL')->nullable();
            $table->date('moveOutDate', 5000)->nullable();
            $table->string('reasonForLeaving', 5000)->nullable();
            $table->boolean('hasPaidAdminFee', 5000)->nullable();
            $table->string('sources', 5000)->nullable();
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
        Schema::dropIfExists('funding_information');
    }
}
