<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentalApplication extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'session_id',
        'signature',
        'date',
        'status',
        'personal_information_id',
    ];

    protected $attributes = [
        'user_id' => null,
        'session_id' => null,
        'signature' => null,
        'date' => null,
        'deleted_at' => null,
        'status' => 0,
        'personal_information_id' => 0,
    ];

}
