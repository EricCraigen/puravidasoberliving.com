<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RulesAndRegulationsFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consentForm = new \App\Models\RulesAndRegulationsForm([
            'application_id' => 1,
            'rule1' => true,
            'rule2' => true,
            'rule3' => true,
            'rule4' => true,
            'rule5' => true,
            'rule6' => true,
            'rule7' => true,
            'rule8' => true,
            'rule9' => true,
            'rule10' => true,
            'rule11' => true,
            'rule12' => true,
            'rule13' => true,
            'rule14' => true,
            'rule15' => true,
            'rule16' => true,
            'rule17' => true,
            'rule18' => true,
            'rule19' => true,
            'rule11' => true,
            'rule20' => true,
            'rule21' => true,
            'rule22' => true,
            'rule23' => true,
            'rule24' => true,
            'rule25' => true,
            'rule26' => true,
            'rule27' => true,
            'rule28' => true,
            'rule29' => true,
            'rule30' => true,
            'rule31' => true,
            'rule32' => true,
            'rule33' => true,
            'rule34' => true,
            'rule35' => true,
            'rule36' => true,
            'signed' => true,
            'date' => date('2021-10-04'),
        ]);
        $consentForm->save();
    }
}
