<?php

namespace App\Http\Livewire\Comments;

use App\Models\Video;
use Livewire\Component;

class Create extends Component
{
    public $comment;
    public $video;

    protected $rules = [
        'comment' => 'required'
    ];

    protected $listeners = ['changeVideoId'];

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function createComment()
    {
        $this->validate();

        $comment = [
            'user_id' => auth()->id(),
            'comment' => $this->comment
        ];

        $this->video->comments()->create($comment);

        session()->flash('success', 'Comentário criado com sucesso!');
        $this->reset('comment');
    }

    public function changeVideoId(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.comments.create');
    }
}
