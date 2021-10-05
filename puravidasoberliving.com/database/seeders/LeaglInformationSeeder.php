<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeaglInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergencyContact = new \App\Models\LegalInformation([
            'application_id' => 1,
            'isSexOffender' => false,
            'isArsonist' => false,
            'isKidnapper' => false,
            'onLegalSupervision' => false,
            'firstName' => 'Dave',
            'lastName' => 'Jones',
            'agency' => 'SPD',
            'phone' => '5094964544',
            'convictions' => '{"0": "B and E","1": "Assault"}',
        ]);
        $emergencyContact->save();
    }
}
