<?php

namespace App\Services\Auth;

use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Profile;
use App\Events\Registered;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AuthService
{
    /**
     * Register a new user.
     *
     * This method handles user registration. It stores user data temporarily in the cache
     * and sends a verification code to the user's email.
     *
     * @param array $data User data: email, password, etc.
     * @return array Contains message, status, and additional data.
     */
    public function register($data)
    {
        try {
            // Generate a unique cache key for the user data
            $userDataKey = 'user_data_' . $data['email'];

            // Check if the user data is already cached
            if (Cache::has($userDataKey)) {
                return [
                    'status' => 400,
                    'message' => "You can't register now. Please verify your account or try after an hour.",
                ];
            }

            // Store user data in cache for 1 hour
            Cache::put($userDataKey, $data, 3600);

            // Generate a unique cache key for the verification code
            $verifkey = 'verification_code_' . $data['email'];

            // Check if the verification code already exists in the cache
            if (Cache::has($verifkey)) {
                return [
                    'status' => 400,
                    'message' => "You can't resend the code again, please try after an hour.",
                ];
            }

            // Generate a random 6-digit code and store it in the cache
            $code = Cache::remember($verifkey, 3600, function () {
                return random_int(100000, 999999);
            });

            // Trigger the Registered event to send the verification email
            event(new Registered($data, $verifkey));

            // Return success response
            return [
                'message' => 'Verification code sent successfully',
                'status' => 201, // HTTP status code for created
                'data' => [
                    'email' => $data['email'],
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
     * This method authenticates a user using their email and password.
     * If successful, it returns a JWT token for further authenticated requests.
     *
     * @param array $credentials User credentials: email, password.
     * @return array Contains message, status, data, and authorization details.
     */
    public function login($credentials)
    {
        try {
            // Attempt to authenticate the user using JWT
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
     * This method logs out the currently authenticated user.
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
     * This method refreshes the JWT token for the authenticated user.
     *
     * @return array Contains message, status, user, and authorization details.
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
     * Login a user using Google OAuth.
     *
     * This method authenticates a user using Google OAuth.
     * If successful, it returns a JWT token for further authenticated requests.
     *
     * @param string $googleToken Google access token.
     * @return array Contains message, status, and authorization details.
     */
    public function loginwithgoogel($googleToken)
    {
        try {
            // Get user info from Google API
            $response = Http::get("https://www.googleapis.com/oauth2/v1/userinfo?access_token={$googleToken}");

            // If the request fails
            if ($response->failed()) {
                return [
                    'message' => 'Failed to fetch user info from Google',
                    'status' => $response->status(),
                ];
            }

            // Decode the response JSON
            $userData = $response->json();

            // Find or create the user
            $user = User::firstOrCreate(
                ['email' => $userData['email'],
                    'password' => bcrypt('123456dummy'),
                    'google_id' => $userData['id'],
                ]
            );

            // Generate a JWT token for the user
            $token = JWTAuth::fromUser($user);

            // Return success response
            return [
                'message' => 'Logged in successfully',
                'status' => 200,
                'authorisation' => [
                    'token' => $token, // Return the generated token
                    'type' => 'bearer', // Token type
                ],
            ];
        } catch (Exception $e) {
            // Log the error
            Log::error('Error in login with Google: ' . $e->getMessage());

            // Return error response
            return [
                'message' => 'An error occurred while logging in with Google',
                'status' => 500,
            ];
        }
    }
}
