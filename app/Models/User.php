<?php

namespace App\Models;

use App\Http\Controllers\CacaoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\UsesUuid;
use function PHPUnit\Framework\returnArgument;


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

    public function cacaos(){
        return $this->hasMany(Cacao::class, 'uploaderId');
    }
}
