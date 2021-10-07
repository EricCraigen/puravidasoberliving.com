<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            // RentalApplicationSeeder::class,
            // PersonalInformationSeeder::class,
            // EmergencyContactSeeder::class,
            // LeaglInformationSeeder::class,
            // MedicalInformationSeeder::class,
            // FundingInformationSeeder::class,
            // IdentificationInformationSeeder::class,
            // RecoveryInformationSeeder::class,
            // ConsentFormSeeder::class,
            // RulesAndRegulationsFormSeeder::class,
        ]);

        \App\Models\User::factory(10)->create();
    }
}