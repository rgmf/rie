<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use App\Models\Album;
use App\Models\Media;

class MediasAccessController extends Controller
{
    public function serve(Album $album, Media $media)
    {
        $path = Config::get('filesystems.disks.local.root') .
                  DIRECTORY_SEPARATOR .
                  $media->data;
        return response()->file($path);
    }
}
