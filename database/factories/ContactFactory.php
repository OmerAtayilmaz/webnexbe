<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->sentence(10),
            'status' => $this->faker->randomElement(['new', 'read', 'replied']),
            'created_at' => Carbon::now()->subDays(rand(0, 30))->startOfDay()->addHours(rand(8, 18)), // Past 30 days, within work hours
            'updated_at' => Carbon::now(),
        ];
    }
}
