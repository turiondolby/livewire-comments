<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function markdownBody()
    {
        return Str::of($this->body)->markdown([
            'html_input' => 'strip',
        ]);
    }

    public function scopeParent(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->oldest();
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
