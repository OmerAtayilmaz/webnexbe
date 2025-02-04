<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quote;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->sentence(10),
            'company' => $this->faker->company(),
            'service' => $this->faker->randomElement(['Web Development', 'SEO', 'Marketing', 'Consulting']),
            'created_at' => Carbon::now()->subDays(rand(0, 30))->startOfDay()->addHours(rand(8, 18)), // Past 30 days, within work hours
            'updated_at' => Carbon::now(),
        ];
    }
}
