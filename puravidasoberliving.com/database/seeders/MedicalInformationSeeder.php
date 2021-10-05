<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MedicalInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MedicalInfo = new \App\Models\MedicalInformation([
            'application_id' => 1,
            'hasScripts' => true,
            'medications' => '{"0": "Nicotine Gum", "1": "IBProfan"}',
            'drugUse' => '{"drugOfChoice": {"0": "THC"}, "lastUse": {"0": "2021-10-4"}',
        ]);
        $MedicalInfo->save();
    }
}
