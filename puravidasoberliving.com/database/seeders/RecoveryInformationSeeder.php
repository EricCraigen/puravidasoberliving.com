<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RecoveryInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recoveryInfo = new \App\Models\RecoveryInformation([
            'application_id' => 1,
            'txtGoingWell' => 'Things that are going super well',
            'txtGoingBad' => 'Things that are going supe bad',
            'txtHopesGoals' => 'Hope and goals for future in recovery',
        ]);
        $recoveryInfo->save();
    }
}
