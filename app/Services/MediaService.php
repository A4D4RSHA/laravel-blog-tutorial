<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Str;

class MediaService
{
    public static function upload($file, $folder = "upload")
    {
        // File Name (Original)
        $name = Str::slug($file->getClientOriginalName());

        // File Extension
        $ext = $file->extension();

        // File Type (Mime Type)
        $type = $file->getMimeType();

        // File Name (Random Generator)
        $path = Str::random(10) . mt_rand(1, 100) . "." . $ext;

        // Upload
        $file->storeAs("public/" . $folder, $path);

        // Media Table Store
        $media = Media::create([
            'name' => $name,
            'path' => $folder . "/" . $path,
            'type' => $type,
        ]);

        // Return Media ID
        return $media->id;
    }
}
