<?php

namespace Database\Factories;

use App\Models\Task ;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'long_description' => fake()->optional(.5)->paragraph(),
            'completed' => fake()->boolean(),
            'created_at' => now(),
        ];
    }
}
