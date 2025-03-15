<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Trip::create([
                'description' => $faker->sentence,
                'trip_start' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
                'from' => $faker->numberBetween(1, 2), // Assuming city IDs are between 1 and 100
                'to' => $faker->numberBetween(1, 2), // Assuming city IDs are between 1 and 100
                'status' => $faker->randomElement(['Pending', 'Ending', 'Complete']),
                'seat_price' => $faker->randomFloat(2, 10, 500),
                'available_seats' => $faker->numberBetween(1, 50),
                'user_id' => $faker->numberBetween(1, 10), // Assuming user IDs are between 1 and 10
            ]);
        }
    }
}
