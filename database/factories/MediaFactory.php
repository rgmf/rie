<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'hash' => $this->faker->sha256,
            'data' => 'media/image.png',
            'thumbnail' => 'thumbnail/image.png',
            'size' => 25874,
            'date_created' => time(),
            'media_type' => 'image',
            'mime_type' => 'mime/png'
        ];
    }
}
