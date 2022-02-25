<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $comment;

    public $isReplying = false;

    public $replyState = [
        'body' => ''
    ];

    public function postReply()
    {
        dd($this->replyState);
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
