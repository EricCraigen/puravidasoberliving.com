<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificationInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'state',
        'number',
        'expiration',
        'hasSocialCard',
    ];

    protected $attributes = [
        'type' => null,
        'state' => null,
        'number' => null,
        'expiration' => null,
        'hasSocialCard' => null,
    ];
}
