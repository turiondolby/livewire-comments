<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $model;

    public function render()
    {
        $comments = $this->model->comments()->parent()->latest()->get();

        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }
}
