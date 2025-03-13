<?php

namespace App\Services\Auth;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class VerficatioService
{
    public function verficationacount($data)
    {
        // Generate the cache key for the verification code
        $verifkey = 'verification_code_' . $data['email'];

        // Retrieve the cached verification code
        $cachedCode = Cache::get($verifkey);

        // Check if the provided code matches the cached code
        if ($cachedCode ==  $data['code']) {
            // Retrieve the user data from cache
            $userDataKey = 'user_data_' . $data['email'];
            $userData = Cache::get($userDataKey);

            if (!$userData) {
                return [
                    'message' => 'User data not found in cache',
                    'status' => 404,
                ];
            }

            // Create the user in the database
            $user = User::create([
                'email' => $userData['email'],
                'password' => bcrypt($userData['password']), // Ensure to hash the password
                'email_verified_at' => now(),
            ]);
            $token = JWTAuth::fromUser($user);

            // Clear the verification code and user data from the cache
            Cache::forget($verifkey);
            Cache::forget($userDataKey);
            $countries = Country::select('id', 'country_name')->get();


            return [
                'message' => 'Email verified successfully and user registered',
                'status' => 200,
                'data' => [
                    'token' => $token, // Return the generated token
                    'countries' => $countries
                ]
            ];
        } else {
            return [
                'message' => 'Invalid verification code',
                'status' => 400,
            ];
        }
    }
}
