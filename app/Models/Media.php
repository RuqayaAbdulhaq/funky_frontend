<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $primaryKey = 'media_id';

    protected $fillable = [
        'title',
        'file_name',
        'file_path',
        'file_type',
        'mime_type',
        'file_size',
    ];
}