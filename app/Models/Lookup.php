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
        'img',
        'description',
    ];

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