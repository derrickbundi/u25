<?php
use Intervention\Image\Facades\Image as Image;
use App\Jobs\CompressVideo;

function u25_compressVideo($video) {
    $folder = 'Videos/';
    $video_name = time() . rand(100,999) . '.mp4';
    $new_folder = public_path($folder . $video_name);
    $biltrate = "700k";
    $storage_path = Storage::disk('public')->makeDirectory('videos/');
    $storage_path_full = '/'.$video_name;
    $local_video = Storage::disk('public')->put($storage_path_full, file_get_contents($video));

    $data = [
        'video_name' => $video_name,
        'biltrate' => $biltrate,
        'new_folder' => $new_folder
    ];

    CompressVideo::dispatch($data)->delay(now()->addSeconds(10));
    return $video_name;
}
function u25_compressImage($image) {
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('Images/'.$filename);
    Image::make($image)->resize(800,400)->save($location);
    return $filename;
}