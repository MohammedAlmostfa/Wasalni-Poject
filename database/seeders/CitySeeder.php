<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 2; $i++) {
            City::create([
                'city_name' => $faker->city, // اسم مدينة عشوائي
                "country_id"=>1,
            ]);
        }

    }
}
