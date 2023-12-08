<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'excerpt',
        'content',
        'image',
        'title',
        'excerpt',
        'body',
        'published_by',
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
