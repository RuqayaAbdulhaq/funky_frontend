<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'title',
        'text',
        'thumb_img_id',
        'main_img_id',
    ];

    public function thumbImage()
    {
        return $this->belongsTo(Media::class, 'thumb_img_id', 'media_id');
    }

    public function mainImage()
    {
        return $this->belongsTo(Media::class, 'main_img_id', 'media_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Lookup::class,
            'blog_lookup',
            'blog_id',
            'lookup_id'
        );
    }
}