<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    /** @use HasFactory<\Database\Factories\TreatmentFactory> */
    use HasFactory;
        protected $fillable = [
        'id',
        'disease',
        'short_description',
        'img_url',
    ];

    public function keypoints()
    {
        return $this->hasMany(TreatmentKeyPoint::class, 'disease_id');
    }
}
