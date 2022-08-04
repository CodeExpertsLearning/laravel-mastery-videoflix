<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \FFMpeg;

class CreateThumbFromAVideoJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        //
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $thumb = 'thumbnails/' . $this->video->code . '/thumbnail.png';

        FFMpeg::fromDisk('videos')
            ->open($this->video->video)
            ->getFrameFromSeconds(5)
            ->export()
            ->toDisk('public')
            ->save($thumb);

        $this->video->update([
            'thumb' => $thumb
        ]);
    }
}
