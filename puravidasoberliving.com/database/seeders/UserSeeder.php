<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'email' => 'eric.craigen.cd@gmail.com',
            'user_name' => 'eric.craigen',
            'password' => Hash::make('testtest'),
            'first_name' => 'Eric',
            'middle_name' => 'Matthew',
            'last_name' => 'Craigen',
            'street_address_1' => '4216 N McDonald Road',
            'street_address_2' => 'F 102',
            'city' => 'Spokane Valley',
            'postalCode' => '99216',
            'email_verified_at' => now(),
        ]);
        $user->save();

        $user = new User([
            'email' => 'aaron@reclaimprojectnw.org',
            'user_name' => 'arron.allen',
            'password' => Hash::make('password'),
            'first_name' => 'Arron',
            'middle_name' => null,
            'last_name' => 'Allen',
            'street_address_1' => '548 W Somewhere Court',
            'street_address_2' => null,
            'city' => 'Spokane',
            'postalCode' => '99207',
            'email_verified_at' => now(),
        ]);
        $user->save();

        $user = new User([
            'email' => 'john@reclaimprojectnw.org',
            'user_name' => 'john.ahem',
            'password' => Hash::make('password'),
            'first_name' => 'John',
            'middle_name' => null,
            'last_name' => 'Ahem',
            'street_address_1' => '8457 S Righthere Lane',
            'street_address_2' => null,
            'city' => 'Spokane',
            'postalCode' => '99208',
            'email_verified_at' => now(),
        ]);
        $user->save();
    }
}
