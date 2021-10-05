<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmergencyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergencyContact = new \App\Models\EmergencyContact([
            'application_id' => null,
            'user_id' => 1,
            'firstName' => 'Eric',
            'lastName' => 'Craigen',
            'phone' => '5094964544',
            'city' => 'Spokane Valley',
            'state' => 'Washington',
            'kinship' => 'Friend',
        ]);
        $emergencyContact->save();

        $emergencyContact = new \App\Models\EmergencyContact([
            'application_id' => null,
            'user_id' => 1,
            'firstName' => 'Jamie',
            'lastName' => 'Gould',
            'phone' => '2089469398',
            'city' => 'Spokane Valley',
            'state' => 'Washington',
            'kinship' => 'Spouse',
        ]);
        $emergencyContact->save();
    }
}
