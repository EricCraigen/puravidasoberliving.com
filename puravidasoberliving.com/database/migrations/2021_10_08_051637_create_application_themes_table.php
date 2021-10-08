<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('theme_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('base_color');
            $table->string('accent_color');
            $table->string('accent_dark_color');
            $table->string('text_light_color');
            $table->string('text_dark_color');
            $table->boolean('animations');
            $table->jsonb('button_options');
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
        Schema::dropIfExists('application_themes');
    }
}