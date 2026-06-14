<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    protected $fillable = [
        // 'post_id',
        'type',
        'position',
        'width',
        'height',
        'alignment',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
        'width' => 'integer',
        'height' => 'integer',
        'position' => 'integer',
    ];
}
