<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'title',
        'thumb_img',
        'main_img',
        'text',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            Lookup::class,
            'blog_lookup',
            'blog_id',
            'lookup_id'
        )->where('type', 'BLOG_CATEGORY');
    }
}