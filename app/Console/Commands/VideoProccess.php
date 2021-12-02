<?php

namespace App\Console\Commands;

use FFMpeg\Format\Video\X264;
use \FFMpeg;
use Illuminate\Console\Command;

class VideoProccess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:proccess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A Command To Process Video To HLS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $video = 'videos/E8VUFLHbmdbRbUfB34x2OgSLmh8uUMF38zEVaEk6.mp4';
        $videoProcessed = 'processed/E8VUFLHbmdbRbUfB34x2OgSLmh8uUMF38zEVaEk6.m3u8';


        $lowBitrateFormat  = (new X264)->setKiloBitrate(500);
        $midBitrateFormat  = (new X264)->setKiloBitrate(1500);
        $highBitrateFormat = (new X264)->setKiloBitrate(3000);

        FFMpeg::fromDisk('public')
            ->open($video)
            ->exportForHLS()
            ->addFormat($lowBitrateFormat)
            ->addFormat($midBitrateFormat)
            ->addFormat($highBitrateFormat)
            ->onProgress(function ($progress) {
                $this->info("Progress= {$progress}%");
            })
            ->toDisk('public')
            ->save($videoProcessed);
    }
}
