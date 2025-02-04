<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Quote;
use App\Models\Contact;
use App\Models\Newsletter;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('test1234'),
        ]);

        foreach (range(1, 30) as $day) {
            $date = Carbon::now()->subDays($day)->startOfDay(); // Set specific day
            Quote::factory(rand(5, 10))->create([
                'created_at' => $date->addHours(rand(8, 18)), // Random time within work hours
                'updated_at' => $date,
            ]);
        }

        foreach (range(1, 30) as $day) {
            $date = Carbon::now()->subDays($day)->startOfDay(); // Set specific day
            Newsletter::factory(rand(5, 10))->create([
                'created_at' => $date->addHours(rand(8, 18)), // Random time within work hours
                'updated_at' => $date,
            ]);
        }

        foreach (range(1, 30) as $day) {
            $date = Carbon::now()->subDays($day)->startOfDay(); // Set specific day
            Contact::factory(rand(5, 10))->create([
                'created_at' => $date->addHours(rand(8, 18)), // Random time within work hours
                'updated_at' => $date,
            ]);
        }

    }
}
