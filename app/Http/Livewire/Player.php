<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Player extends Component
{
    public $video;

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.player')
            ->layout('layouts.player-base');
    }
}
