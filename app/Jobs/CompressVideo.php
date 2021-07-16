<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Storage;

class CompressVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $tries = 3;
    public $timeout = 3600;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function handle()
    {
        $new_folder = $this->data['new_folder'];
        $biltrate = $this->data['biltrate'];
        $video_name = $this->data['video_name'];

        $video = storage_path('app/public/').$video_name;
        $command = "ffmpeg -i $video -b:v $biltrate -bufsize $biltrate $new_folder";

        system($command);
        $response = Storage::disk('public')->delete($video_name);
    }
}
