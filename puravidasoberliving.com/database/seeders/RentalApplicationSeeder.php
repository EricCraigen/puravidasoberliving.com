<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RentalApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rentalApplication = new \App\Models\RentalApplication([
            'user_id' => 1,
            'signature' => 'Eric M Craigen',
            'date' => date('2021-10-04'),
        ]);
        $rentalApplication->save();
    }
}
