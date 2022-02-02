<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }

    public function contents()
    {
        return $this->morphedByMany(Content::class, 'taggable');
    }
}
