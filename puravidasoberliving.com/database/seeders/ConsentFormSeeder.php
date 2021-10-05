<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsentFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consentForm = new \App\Models\ConsentForm([
            'application_id' => 1,
            'employmentSecurityDepartment' => true,
            'socialSecurityAdministration' => true,
            'departmentOfCorrections' => true,
            'childSupportEnforcement' => true,
            'healthCareProviders' => true,
            'mentalHealthProviders' => true,
            'chemicalDependencyProviders' => true,
            'housingProgramProviders' => true,
            'departmentOfSocialHealthServices' => true,
            'collegesAndEducationProviders' => true,
            'attachedLists' => true,
            'others' => true,
            'mentalHealthAC' => true,
            'hivStdAC' => true,
            'attachedListsAC' => true,
            'signed' => true,
            'date' => date('2021-10-04'),
        ]);
        $consentForm->save();
    }
}
