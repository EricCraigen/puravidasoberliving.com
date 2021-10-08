<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_config_id',
        'user_type_code',
        'user_permission_code',
        'country_code',
        'state_code',
        'rental_team_code',
        'theme_code',
    ];

}
