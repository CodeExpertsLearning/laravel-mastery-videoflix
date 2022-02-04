<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Content;

class Player extends Component
{
    public $videos;
    public $content;

    public $current;
    public $videoId;

    public function mount(Content $content)
    {
        $this->content = $content;
        $this->videos = $content->videos->toArray();

        if($content->type == 2) {
            $this->current = $this->videos[0]['code'] . '/' . $this->videos[0]['processed_video'];
            $this->videoId = $this->videos[0]['id'];
        }

    }

    public function render()
    {
        return view('livewire.player')->layout('layouts.player-base');
    }
}
