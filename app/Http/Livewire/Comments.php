<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $model;

    public $newCommentState = [
      'body' => ''
    ];

    protected $validationAttributes = [
        'newCommentState.body' => 'comment'
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function postComment()
    {
        $this->validate([
            'newCommentState.body' => 'required'
        ]);

        $comment = $this->model->comments()->make($this->newCommentState);
        $comment->user()->associate(auth()->user());
        $comment->save();

        $this->newCommentState = [
            'body' => ''
        ];
    }

    public function render()
    {
        $comments = $this->model
            ->comments()
            ->with('user', 'children.user', 'children.children')
            ->parent()
            ->latest()
            ->get();

        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }
}
