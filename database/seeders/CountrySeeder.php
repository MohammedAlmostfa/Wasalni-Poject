<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method fetches country data from an external API and seeds the countries table.
     *
     * @return void
     */
    public function run(): void
    {
        // Fetch country data from the API
        $response = Http::get('https://countriesnow.space/api/v0.1/countries');

        // Check if the API request was successful
        if ($response->successful()) {
            $data = $response->json(); // Decode the JSON response

            // Loop through each country in the response data
            foreach ($data['data'] as $countryData) {
                // Create a new country record in the database
                Country::create([
                    'country_name' => $countryData['country'], // Use the country name from the API
                ]);
            }
        }
    }
}
