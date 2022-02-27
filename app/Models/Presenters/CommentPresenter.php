<?php

namespace App\Models\Presenters;

use App\Models\Comment;
use Illuminate\Support\Str;

class CommentPresenter
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function markdownBody()
    {
        return Str::of($this->comment->body)->markdown([
            'html_input' => 'strip',
        ]);
    }

    public function relativeCreatedAt()
    {
        return $this->comment->created_at->diffForHumans();
    }
}
