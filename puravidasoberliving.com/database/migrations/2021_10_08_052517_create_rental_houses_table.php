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
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned()->default(1);
            $table->integer('house_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('street_address_1');
            $table->string('street_address_2');
            $table->string('city');
            $table->integer('state_id')->unsigned()->default(1);
            $table->string('postal_code');
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
        Schema::dropIfExists('rental_houses');
    }
}