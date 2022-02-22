<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
