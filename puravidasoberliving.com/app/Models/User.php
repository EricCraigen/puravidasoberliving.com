<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userType',
        'firstName',
        'lastName',
        'streetAddress1',
        'streetAddress2',
        'city',
        'state',
        'postalCode',
        'email',
        'password',
        'renterStatus',
        'applicationId',
    ];

    protected $attributes = [
        'userType' => 1,
        'streetAddress1' => null,
        'streetAddress2' => null,
        'city' => null,
        'state' => null,
        'postalCode' => null,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
