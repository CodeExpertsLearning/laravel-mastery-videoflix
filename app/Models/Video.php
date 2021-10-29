<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'video','thumb', 'slug'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
