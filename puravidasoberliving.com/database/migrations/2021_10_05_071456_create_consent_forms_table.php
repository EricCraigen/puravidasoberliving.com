<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consent_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->boolean('employmentSecurityDepartment')->nullable();
            $table->boolean('socialSecurityAdministration')->nullable();
            $table->boolean('departmentOfCorrections')->nullable();
            $table->boolean('childSupportEnforcement')->nullable();
            $table->boolean('healthCareProviders')->nullable();
            $table->boolean('mentalHealthProviders')->nullable();
            $table->boolean('chemicalDependencyProviders')->nullable();
            $table->boolean('housingProgramProviders')->nullable();
            $table->boolean('departmentOfSocialHealthServices')->nullable();
            $table->boolean('collegesAndEducationProviders')->nullable();
            $table->boolean('attachedLists')->nullable();
            $table->boolean('others')->nullable();
            $table->boolean('mentalHealthAC')->nullable();
            $table->boolean('hivStdAC')->nullable();
            $table->boolean('attachedListsAC')->nullable();
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
        Schema::dropIfExists('consent_forms');
    }
}
