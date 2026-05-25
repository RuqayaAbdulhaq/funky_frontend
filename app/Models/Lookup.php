<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    protected $table = 'lookup';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type',
        'img_id',
        'description',
    ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'img_id', 'media_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_lookup',
            'lookup_id',
            'blog_id'
        );
    }
}