<?php

namespace App\Services\Auth;

use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProfileSevice
{
    /**
     * Create a new profile for the authenticated user.
     *
     * @param array $data The profile data to be stored.
     * @return array An array containing the result of the operation.
     */
    public function creatAprofile($data)
    {
        try {
            $user = Auth::user();

            // Check if the user already has a profile
            if (!$user->profile) {
                // Create a profile for the user
                $profile = Profile::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'gender' => $data['gender'] ?? null, // Optional field
                    'birthday' => $data['birthday'] ?? null, // Optional field
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'user_id' => $user->id, // Link profile to the user
                    'country_id' => $data['country_id'],
                ]);

                // Find the country by ID
                $country = Country::find($data['country_id']);

                // Check if cities for the selected country already exist
                if (!City::where('country_id', $data['country_id'])->exists()) {
                    // Make API call to fetch cities for the selected country
                    $response = Http::post('https://countriesnow.space/api/v0.1/countries/cities', [
                        'country' => $country->country_name,
                    ]);

                    // If the API call is successful, save the cities to the database
                    if ($response->successful()) {
                        $cities = $response->json()['data']; // Extract cities from the response

                        // Create cities in the database
                        foreach ($cities as $cityName) {
                            City::create([
                                'city_name' => $cityName,
                                'country_id' => $country->id,
                            ]);
                        }
                    }
                }

                return [
                    'message' => 'Profile created successfully',
                    'data' => $profile,
                    'status' => 200,
                ];
            } else {
                return [
                    'message' => 'User already has a profile',
                    'data' => $user->profile, // Return the existing profile
                    'status' => 200,
                ];
            }
        } catch (Exception $e) {
            // Log the error
            Log::error('Error in add profile data: ' . $e->getMessage());
            return [
                'message' => 'An error occurred during add profile data',
                'status' => 500,
                'data' => null,
            ];
        }
    }

    /**
     * Update the profile of the authenticated user.
     *
     * @param array $data The updated profile data.
     * @return array An array containing the result of the operation.
     */
    public function updateprfile($data)
    {
        try {
            $user = Auth::user();
            $profile = $user->profile;

            // Check if the user already has a profile
            if ($profile) {
                // Update the profile
                $profile->update([
                    'first_name' => $data['first_name'] ?? $profile->first_name,
                    'last_name' => $data['last_name'] ?? $profile->last_name,
                    'gender' => $data['gender'] ?? $profile->gender,
                    'birthday' => $data['birthday'] ?? $profile->birthday,
                    'phone' => $data['phone'] ?? $profile->phone,
                    'address' => $data['address'] ?? $profile->address,
                    'country_id' => $data['country_id'] ?? $profile->country_id,
                ]);

                // Find the country by ID
                $country = Country::find($profile->country_id);

                // Check if cities for the selected country already exist
                if (!City::where('country_id', $profile->country_id)->exists()) {
                    // Make API call to fetch cities for the selected country
                    $response = Http::post('https://countriesnow.space/api/v0.1/countries/cities', [
                        'country' => $country->country_name,
                    ]);

                    // If the API call is successful, save the cities to the database
                    if ($response->successful()) {
                        $cities = $response->json()['data']; // Extract cities from the response

                        // Create cities in the database
                        foreach ($cities as $cityName) {
                            City::create([
                                'city_name' => $cityName,
                                'country_id' => $country->id,
                            ]);
                        }
                    }
                }

                return [
                    'message' => 'Profile updated successfully',
                    'data' => $profile,
                    'status' => 200,
                ];
            } else {
                return [
                    'message' => 'User does not have a profile',
                    'data' => null,
                    'status' => 404,
                ];
            }
        } catch (Exception $e) {
            // Log the error
            Log::error('Error in update profile data: ' . $e->getMessage());
            return [
                'message' => 'An error occurred during update profile data',
                'status' => 500,
                'data' => null,
            ];
        }
    }
    /**
     * Get the authenticated user's data.
     *
     * This method retrieves the data of the currently authenticated user.
     *
     * @return array Contains message, status, and user data.
     */
    public function getme()
    {
        try {
            // Get the authenticated user

            $user =Auth::user();

            // Return user data
            return [
                'message' => 'User data retrieved successfully',
                'status' => 200, // HTTP status code for success
                'data' => [
                    'id' => $user->id,
                    'name' => $user->profile->first_name . ' ' . $user->profile->last_name,
                    'email' => $user->email,
                    'gender' => $user->profile->gender,
                    'birthday' => $user->profile->birthday,
                    'phone' => $user->profile->phone,
                    'address' => $user->profile->address,

                ],
            ];
        } catch (Exception $e) {
            // Log the error if fetching user data fails
            Log::error('Error in getme: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while fetching user data',
                'data' => null,
                'status' => 500, // HTTP status code for server error
            ];
        }
    }
}
