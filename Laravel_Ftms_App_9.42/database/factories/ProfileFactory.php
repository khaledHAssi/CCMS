<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => fake()->words(5, true),
            'bio' => fake()->text(),
            'fb' => fake()->url(),
            'tw' => fake()->url(),
            'li' => fake()->url(),
            'user_id' => fake()->unique()->numberBetween(1, 20)
        ];
    }
}
