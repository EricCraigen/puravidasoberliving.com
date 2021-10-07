<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkApplicationInformationIdsOnRentalApplicaitonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('personal_information', function($table) {
        //     $table->foreign('personal_information_id')->references('id')->on('rental_applications');
        //     // $table->foreign('session_id')->references('session_id')->on('personal_information');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
