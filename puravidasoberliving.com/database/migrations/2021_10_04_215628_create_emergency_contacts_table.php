<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('kinship', 150)->nullable();
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('rental_applications');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_contacts');
    }
}
