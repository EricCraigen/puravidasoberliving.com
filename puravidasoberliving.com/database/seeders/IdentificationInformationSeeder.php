<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IdentificationInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identificationInfo = new \App\Models\IdentificationInformation([
            'application_id' => 1,
            'type' => 'Driver\'s License',
            'state' => 'Washington',
            'number' => 'WDL3432343553233',
            'expiration' => date('2022-05-01'),
            'hasSocialCard' => true,
        ]);
        $identificationInfo->save();
    }
}
