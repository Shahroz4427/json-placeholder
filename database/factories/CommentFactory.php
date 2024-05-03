<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['post_id' => "int", 'name' => "string", 'email' => "string", 'body' => "string"])] public function definition(): array
    {
        return [
            'post_id'=>1,
            'name'=>fake()->name,
            'email'=>fake()->email,
            'body'=>fake()->text
        ];
    }
}
