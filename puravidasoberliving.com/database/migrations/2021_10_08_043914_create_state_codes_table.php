<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_codes', function (Blueprint $table) {
            $table->bigIncrements('state_code')->index();
            $table->string('name');
            $table->timestamps();

            // $table->foreign('state_code')->references('state_code')->on('user_configs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_codes');
    }
}
