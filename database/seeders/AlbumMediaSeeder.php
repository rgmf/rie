<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Database\Seeder;

class AlbumMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = Album::all();
        $albums->each(function($album) {
            $medias = Media::all();
            $medias->each(function($media) use ($album) {
                $album->medias()->attach(
                    $media,
                    [
                        'created_at' => 0,
                        'updated_at' => 0
                    ]
                );
            });
        });
    }
}
