<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userType');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('streetAddress1', 500)->nullable();
            $table->string('streetAddress2', 500)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('postalCode', 255)->nullable();
            $table->string('email')->unique();
            $table->string('renter_status')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            // $table->string('session_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('application_id')->references('id')->on('rental_applications');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
