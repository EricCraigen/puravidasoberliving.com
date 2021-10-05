<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FundingInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fundingInfo = new \App\Models\FundingInformation([
            'application_id' => 1,
            'hasLivedWithPVSL' => true,
            'moveOutDate' => date('2020-05-01'),
            'reasonForLeaving' => 'Fulfilled Rental Agreement',
            'hasPaidAdminFee' => false,
            'sources' => '{"name": "Apex Painting", "amount": "30", "frequency": "1", "startDate": "2020-04-01", "reference": {"firstName": "Thomas", "lastName": "Craigen", "phone": "5092942930"}',
        ]);
        $fundingInfo->save();
    }
}
