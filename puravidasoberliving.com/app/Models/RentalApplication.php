<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $attributes = [
        'signature' => null,
        'date' => null,
    ];

}
