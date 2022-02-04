<?php

namespace App\Http\Livewire\Comments;

use App\Models\Video;
use Livewire\Component;

class Comments extends Component
{
    protected $listeners = ['changeVideoId'];
    public $comments;

    public function mount(Video $video)
    {
        $this->comments = $video->comments;
    }

    public function changeVideoId(Video $video)
    {
        $this->comments = $video->comments;
    }

    public function render()
    {
        return view('livewire.comments.comments');
    }
}
