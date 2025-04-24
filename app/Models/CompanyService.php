<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'type',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : null;
    }
}
