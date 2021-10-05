<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonalInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personalInfo = new \App\Models\PersonalInformation([
            'application_id' => 1,
            'firstName' => 'James',
            'middleInitial' => 'D',
            'lastName' => 'Halstead',
            'dob' => date('1989-12-19'),
            'ssn' => '432534325',
            'phone' => '5094535234',
        ]);
        $personalInfo->save();
    }
}
