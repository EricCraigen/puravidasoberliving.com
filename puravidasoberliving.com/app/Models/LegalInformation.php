<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'isSexOffender',
        'isArsonist',
        'isKidnapper',
        'onLegalSupervision',
        'firstName',
        'lastName',
        'agency',
        'phone',
        'convictions',
    ];

    protected $attributes = [
        'isSexOffender' => null,
        'isArsonist' => null,
        'isKidnapper' => null,
        'onLegalSupervision' => null,
        'firstName' => null,
        'lastName' => null,
        'agency' => null,
        'phone' => null,
        'convictions' => null,
    ];
}
