<?php

namespace App\Http\Livewire\Content\Video;

use App\Jobs\CreateThumbFromAVideoJob;
use App\Jobs\VideoProcessingJob;
use App\Models\Content;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Uuid;

class CreateVideo extends Component
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

        $makeThumbVideoJobs = [];
        $processVideoJobs   = [];

        foreach ($videosUploadedFile as $videoUploaded) {
            $video = [
                'name' => $videoUploaded->getClientOriginalName(),
                'video' => $videoUploaded->store('', 'videos'),
                'slug'  => \Illuminate\Support\Str::slug($videoUploaded->getClientOriginalName()),
                'thumb' => 'image.png',
                'code'  => Uuid::uuid4()
            ];

            $video = $this->content->videos()->create($video);

            $makeThumbVideoJobs[] = new CreateThumbFromAVideoJob($video);
            $processVideoJobs[]   = new VideoProcessingJob($video);
        }

        Bus::batch($makeThumbVideoJobs)->allowFailures()->dispatch();
        Bus::batch($processVideoJobs)->allowFailures()->dispatch();

        return redirect()->route('content.video.list', $this->content);
    }
    public function render()
    {
        return view('livewire.content.video.create-video');
    }
}
