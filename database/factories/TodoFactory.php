<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['user_id' => "int", 'title' => "string", 'completed' => "bool"])] public function definition(): array
    {
        return [
            'user_id'=>1,
            'title'=>fake()->title,
            'completed'=>fake()->boolean
        ];
    }
}
