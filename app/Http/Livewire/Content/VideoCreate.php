<?php

namespace App\Http\Livewire\Content;

use Livewire\{
    WithFileUploads,
    Component
};
use App\Models\Content;


class VideoCreate extends Component
{
    use WithFileUploads;

    public $videos;
    public $content;

    protected $rules = [
        'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska',
    ];

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function uploadVideos()
    {
        $videosUploadedFile = $this->videos;

        foreach ($videosUploadedFile as $videoUploaded) {
            $video = [
                'name' => $videoUploaded->getClientOriginalName(),
                'video' => $videoUploaded->store('videos', 'public'),
                'slug'  => \Illuminate\Support\Str::slug($videoUploaded->getClientOriginalName()),
                'thumb' => 'image.png'
            ];

            $this->content->videos()->create($video);
        }
    }

    public function render()
    {
        return view('livewire.content.video-create');
    }
}
