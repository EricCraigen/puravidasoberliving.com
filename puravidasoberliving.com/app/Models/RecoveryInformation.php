<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecoveryInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'txtGoingWell',
        'txtGoingBad',
        'txtHopesGoals',
    ];

    protected $attributes = [
        'txtGoingWell' => null,
        'txtGoingBad' => null,
        'txtHopesGoals' => null,
    ];
}
