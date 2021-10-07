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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->string('session_id')->unique()->nullable();
            // $table->foreignId('user_id')->nullable()->index();
            // $table->unsignedBigInteger('user_id');
            // $table->string('guest_id')->unique();
            $table->string('signature')->nullable();
            $table->date('date')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('application_id')->references('id')->on('rental_applications');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('guest_id')->references('id')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
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
