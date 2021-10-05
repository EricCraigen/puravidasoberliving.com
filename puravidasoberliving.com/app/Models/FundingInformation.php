<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasLivedWithPVSL',
        'moveOutDate',
        'reasonForLeaving',
        'hasPaidAdminFee',
        'sources',
    ];

    protected $attributes = [
        'hasLivedWithPVSL' => null,
        'moveOutDate' => null,
        'reasonForLeaving' => null,
        'hasPaidAdminFee' => null,
        'sources' => null,
    ];
}
