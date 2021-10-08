<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_houses', function (Blueprint $table) {
            $table->bigIncrements('house_id')->index();
            $table->string('name');
            $table->string('street_address_1');
            $table->string('street_address_2');
            $table->string('city');
            $table->unsignedBigInteger('state_code');
            $table->string('postal_code');
            $table->timestamps();

            $table->foreign('state_code')->references('state_code')->on('state_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_houses');
    }
}