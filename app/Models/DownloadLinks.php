<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadLinks extends Model
{
    /** @use HasFactory<\Database\Factories\DownloadLinksFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'download_link',
        'version',
        'description'
    ];
}
