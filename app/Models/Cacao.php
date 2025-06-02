<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cacao extends Model
{
    /** @use HasFactory<\Database\Factories\CacaoFactory> */
    use HasFactory, HasApiTokens, Notifiable, UsesUuid;

    protected $fillable = [
        'uuid',
        'label',
        'confidence',
        'photo',
        'uploaderId',
        'caption',
        'date_analyzed'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
