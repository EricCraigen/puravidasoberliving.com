<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserConfig;

class UserConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userConfig = new UserConfig([
            'user_id' => 1,
            'user_type_id' => 1,
            'user_permission_id' => 1,
            'country_id' => 1,
            'state_id' => 1,
            'rental_team_id' => 1,
            'theme_id' => 1,
        ]);
        $userConfig->save();
    }
}
