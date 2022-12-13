<?php

namespace Database\Factories;

use App\Models\BookCopy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Checkout>
 */
class CheckoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'book_copy_id' => BookCopy::inRandomOrder()->first()->id,
            'is_returned' => fake()->boolean(),
            'start_time' => fake()->dateTimeInInterval('-7 months', '-1 months'),
            'end_time' => fake()->dateTimeInInterval('-1 months', '+1 months')
        ];
    }
}
