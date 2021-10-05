<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'middleInitial',
        'lastName',
        'dob',
        'ssn',
        'phone',
    ];

    protected $attributes = [
        'firstName' => null,
        'middleInitial' => null,
        'lastName' => null,
        'dob' => null,
        'ssn' => null,
        'phone' => null,
    ];
}
