<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('email', 255);
            $table->string('phoneType', 2);
            $table->string('phone', 16);
            $table->string('subject', 300);
            $table->string('messageContent', 500);
            $table->boolean('agreeToPolicies', false);
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
        Schema::dropIfExists('contact_messages');
    }
}
