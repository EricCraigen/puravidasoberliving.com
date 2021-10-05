<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'city',
        'state',
        'kinship',
    ];

    protected $attributes = [
        'firstName' => null,
        'lastName' => null,
        'phone' => null,
        'city' => null,
        'state' => null,
        'kinship' => null,
    ];
}
 