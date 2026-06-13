<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $table = 'media';

    protected $primaryKey = 'media_id';

    protected $fillable = [
        'title',
        'original_name',
        'file_name',
        'file_path',
        'file_type',
        'mime_type',
        'file_size',
    ];

    protected $appends = [
        'url',
    ];

    public function getUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}