<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'slug', 'type', 'cover'];



    //Scope Local
    public function scopeActiveVideos($query)
    {
        return $this->videos()
            ->whereNotNull('code')
            ->whereNotNull('processed_video');
    }

    //Relations
    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('id', 'ASC');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
