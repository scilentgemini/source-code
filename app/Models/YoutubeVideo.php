<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubeVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_url',
        'description',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
