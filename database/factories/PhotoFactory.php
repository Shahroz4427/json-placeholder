<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     #[ArrayShape(['album_Id' => "int", 'title' => "string", 'url' => "string", 'thumbnail_url' => "string"])] public function definition(): array
    {
        return [
            'album_Id' => 1,
            'title' => fake()->title,
            'url' => fake()->url,
            'thumbnail_url'=>fake()->url
        ];
    }
}
