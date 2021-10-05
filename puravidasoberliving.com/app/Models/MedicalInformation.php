<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasScripts',
        'medications',
        'drugUse',
    ];

    protected $attributes = [
        'hasScripts' => null,
        'medications' => null,
        'drugUse' => null,
    ];
}
