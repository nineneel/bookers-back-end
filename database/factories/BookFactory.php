<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3, true),
            'description' => fake()->paragraph(),
            // 'cover' => fake()->imageUrl('282', '450', 'books'),
            'year' => fake()->year(),
        ];
    }
}
