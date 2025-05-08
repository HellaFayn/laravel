<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\UsesUuid;


class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasApiTokens, Notifiable, UsesUuid;

    protected $fillable = [
        'id',
        'uuid',
        'username',
        'email',
        'password',
        'profile',
        'region',
        'province',
        'city',
        'barangay',
        'role'
    ];
}
