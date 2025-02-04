<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Newsletter>
 */
class NewsletterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //random email and status
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['subscribed', 'subscribed','subscribed','subscribed', 'unsubscribed']),
            'created_at' => Carbon::now()->subDays(rand(0, 30))->startOfDay()->addHours(rand(8, 18)), // Past 30 days, within work hours
            'updated_at' => Carbon::now(),
        ];
    }
}
