<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Comment extends Component
{
    use AuthorizesRequests;

    public $comment;

    public $isReplying = false;

    public $replyState = [
        'body' => ''
    ];

    public $isEditing = false;

    public $editState = [
        'body' => ''
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $validationAttributes = [
        'replyState.body' => 'reply'
    ];

    public function updatedIsEditing($isEditing)
    {
        if (! $isEditing) {
            return;
        }

        $this->editState = [
            'body' => $this->comment->body
        ];
    }

    public function editComment()
    {
        $this->authorize('update', $this->comment);

        $this->comment->update($this->editState);

        $this->isEditing = false;
    }

    public function deleteComment()
    {
        $this->authorize('destroy', $this->comment);

        $this->comment->delete();

        $this->emitUp('refresh');
    }

    public function postReply()
    {
        if (! $this->comment->hasParent()) {
            return;
        }

        $this->validate([
            'replyState.body' => 'required'
        ]);

        $reply = $this->comment->children()->make($this->replyState);
        $reply->user()->associate(auth()->user());
        $reply->commentable()->associate($this->comment->commentable);

        $reply->save();

        $this->replyState = [
            'body' => ''
        ];

        $this->isReplying = false;

        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
