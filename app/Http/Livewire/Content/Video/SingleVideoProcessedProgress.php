<?php

namespace App\Http\Livewire\Content\Video;

use App\Models\Video;
use Livewire\Component;

class SingleVideoProcessedProgress extends Component
{
    public $video;
    public $progress;

    public function mount($video)
    {
        $this->video = $video;
        $this->progress = Video::find($video)->progress;
    }

    public function reloadProgress()
    {
        if($this->progress >= 100) $this->emit('refreshContentListOfVideos');

        $this->progress = Video::find($this->video)->progress;
    }

    public function render()
    {
        return view('livewire.content.video.single-video-processed-progress');
    }
}
