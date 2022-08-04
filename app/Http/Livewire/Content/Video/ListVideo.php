<?php

namespace App\Http\Livewire\Content\Video;

use App\Models\Content;
use Livewire\Component;

class ListVideo extends Component
{
    public $videos;
    public $content;

    public $listeners = ['refreshContentListOfVideos' => '$refresh'];

    public function mount(Content $content)
    {
        $this->content = $content->id;
        $this->videos = $content->videos()->orderBy('id', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.content.video.list-video');
    }
}
