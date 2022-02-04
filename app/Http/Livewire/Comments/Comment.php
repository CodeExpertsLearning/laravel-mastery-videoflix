<?php

namespace App\Http\Livewire\Comments;

use Livewire\Component;
use \App\Models\Comment as CommentModel;

class Comment extends Component
{
    public $comment;

    public function mount(CommentModel $comment)
    {
        $this->commet = $comment;
    }

    public function render()
    {
        return view('livewire.comments.comment');
    }
}
