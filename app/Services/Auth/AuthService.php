<?php

namespace App\Services\Auth;

use App\Models\City;
use Exception;
use App\Models\User;
use App\Models\Country;
use App\Models\Profile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthService
{
    /**
     * Register a new user.
     *
     * @param array $data User data: email, password, first_name, last_name, gender, birthday, phone, address, country_id.
     * @return array Contains message, token, and status.
     */
    public function register($data)
    {
        try {
            // Create a new user
            $user = User::create([
                "email" => $data['email'],
                "password" => bcrypt($data['password']), // Hash the password
            ]);

            // Create a profile for the user
            $profile = Profile::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'] ?? null, // Optional field
                'birthday' => $data['birthday'] ?? null, // Optional field
                'phone' => $data['phone'],
                'address' => $data['address'],
                'user_id' => $user->id, // Link profile to the user
                'country_id' => $data['country_id']
            ]);

            // Find the country by ID
            $country = Country::find($data['country_id']);

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

            // Generate a JWT token for the user
            $token = JWTAuth::fromUser($user);

            // Return success response with user data and token
            return [
                'message' => 'User created successfully',
                'status' => 201, // HTTP status code for created
                'data' => [
                    'name' => $user->profile->first_name,
                    'email' => $user->email,
                    'authorisation' => [
                        'token' => $token, // Return the generated token
                        'type' => 'bearer', // Token type
                    ]
                ],
            ];
        } catch (Exception $e) {
            // Log the error if registration fails
            Log::error('Error in registration: ' . $e->getMessage());
            return [
                'message' => 'An error occurred during registration',
                'status' => 500, // HTTP status code for server error
            ];
        }
    }

    /**
     * Login a user.
     *
     * @param array $credentials User credentials: email, password.
     * @return array Contains message, status, data, and authorization.
     */
    public function login($credentials)
    {
        try {
            // Attempt to authenticate the user
            if (!$token = JWTAuth::attempt($credentials)) {
                // If authentication fails
                return [
                    'message' => 'Account not found',
                    'data' => 'No data available',
                    'status' => 401, // HTTP status code for unauthorized
                    'authorisation' => []
                ];
            } else {
                // If authentication succeeds
                $user = Auth::user();
                return [
                    'message' => 'Login successful',
                    'status' => 201, // HTTP status code for successful creation
                    'data' => [
                        'name' => $user->profile->first_name,
                        'email' => $user->email,
                        'authorisation' => [
                            'token' => $token, // Return the generated token
                            'type' => 'bearer', // Token type
                        ]
                    ],
                ];
            }
        } catch (Exception $e) {
            // Log the error if login fails
            Log::error('Error in login: ' . $e->getMessage());
            return [
                'message' => 'An error occurred during login: ' . $e->getMessage(),
                'status' => 500, // HTTP status code for server error
                'data' => 'Data not available',
                'authorisation' => [],
            ];
        }
    }

    /**
     * Logout the authenticated user.
     *
     * @return array Contains message and status.
     */
    public function logout()
    {
        try {
            // Logout the user
            Auth::logout();
            return [
                'message' => 'Logout successful',
                'status' => 200, // HTTP status code for success
            ];
        } catch (Exception $e) {
            // Log the error if logout fails
            Log::error('Error in logout: ' . $e->getMessage());
            return [
                'message' => 'An error occurred during logout',
                'status' => 500, // HTTP status code for server error
            ];
        }
    }

    /**
     * Refresh the JWT token for the authenticated user.
     *
     * @return array Contains message, status, user, and authorization.
     */
    public function refresh()
    {
        try {
            // Refresh the token for the authenticated user
            return [
                'message' => 'Token refreshed successfully',
                'status' => 200, // HTTP status code for success
                'data' => [
                    'user' => Auth::user(), // Return the authenticated user
                    'authorisation' => [
                        'token' => Auth::refresh(), // Return the new token
                        'type' => 'bearer', // Token type
                    ]
                ]
            ];
        } catch (Exception $e) {
            // Log the error if token refresh fails
            Log::error('Error in token refresh: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while refreshing the token',
                'status' => 500, // HTTP status code for server error
            ];
        }
    }

    /**
     * Get the authenticated user's data.
     *
     * @return array Contains message, status, and user data.
     */
    public function getme()
    {
        try {
            // Get the authenticated user
            $user = Auth::user();

            // Return user data
            return [
                'message' => 'User data retrieved successfully',
                'status' => 200, // HTTP status code for success
                'data' => [
                    'id' => $user->id,
                    'name' => $user->profile->first_name . ' ' . $user->profile->last_name,
                    'email' => $user->email,
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
