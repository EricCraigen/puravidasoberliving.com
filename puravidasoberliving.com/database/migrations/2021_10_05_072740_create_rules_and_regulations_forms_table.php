<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesAndRegulationsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_and_regulations_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->boolean('rule1')->nullable();
            $table->boolean('rule2')->nullable();
            $table->boolean('rule3')->nullable();
            $table->boolean('rule4')->nullable();
            $table->boolean('rule5')->nullable();
            $table->boolean('rule6')->nullable();
            $table->boolean('rule7')->nullable();
            $table->boolean('rule8')->nullable();
            $table->boolean('rule9')->nullable();
            $table->boolean('rule10')->nullable();
            $table->boolean('rule11')->nullable();
            $table->boolean('rule12')->nullable();
            $table->boolean('rule13')->nullable();
            $table->boolean('rule14')->nullable();
            $table->boolean('rule15')->nullable();
            $table->boolean('rule16')->nullable();
            $table->boolean('rule17')->nullable();
            $table->boolean('rule18')->nullable();
            $table->boolean('rule19')->nullable();
            $table->boolean('rule20')->nullable();
            $table->boolean('rule21')->nullable();
            $table->boolean('rule22')->nullable();
            $table->boolean('rule23')->nullable();
            $table->boolean('rule24')->nullable();
            $table->boolean('rule25')->nullable();
            $table->boolean('rule26')->nullable();
            $table->boolean('rule27')->nullable();
            $table->boolean('rule28')->nullable();
            $table->boolean('rule29')->nullable();
            $table->boolean('rule30')->nullable();
            $table->boolean('rule31')->nullable();
            $table->boolean('rule32')->nullable();
            $table->boolean('rule33')->nullable();
            $table->boolean('rule34')->nullable();
            $table->boolean('rule35')->nullable();
            $table->boolean('rule36')->nullable();
            $table->boolean('signed')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('rules_and_regulations_forms');
    }
}
