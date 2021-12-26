<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'video',
        'thumb', 'slug', 'code', 'is_processed', 'processed_video', 'progress'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
