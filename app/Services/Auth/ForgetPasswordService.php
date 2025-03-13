<?php

namespace App\Services\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\SendForgetPasswordCodeMail;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ForgetPasswordService
{
    /**
     * Check if the email exists and send a verification code.
     *
     * @param string $email The email address to send the code to.
     * @return array An array containing the status and message.
     */
    public function checkEmail($email)
    {
        try {
            // Create a unique cache key for the user's email
            $key = $email;

            // Check if a code has already been sent within the last hour
            if (Cache::has($key)) {
                return [
                    'status' => 400,
                    'message' => [
                        'errorDetails' => ["You can't resend the code again, please try after an hour."],
                    ],
                ];
            }

            // Generate a 6-digit random code and store it in the cache for 1 hour
            $code = Cache::remember($key, 3600, function () {
                return random_int(100000, 999999);
            });

            // Send the code to the user's email
            Mail::to($email)->send(new SendForgetPasswordCodeMail($code));

            return [
                'status' => 200,
                'message' => "The code has been sent to your email",
            ];
        } catch (Exception $e) {
            // Log the error and return a server error response
            Log::error("Error in checkEmail: " . $e->getMessage());

            return [
                'status' => 500,
                'message' => [
                    'errorDetails' => ["There is something wrong on the server."],
                ],
            ];
        }
    }

    /**
     * Check if the provided code matches the cached code.
     *
     * @param string $email The email address associated with the code.
     * @param string $code The code to verify.
     * @return array An array containing the status and message.
     */
    public function checkCode($email, $code)
    {
        try {
            // Create a unique cache key for the user's email
            $key = $email;

            // Check if the code exists in the cache
            if (Cache::has($key)) {
                $cached_code = Cache::get($key);

                // Verify if the provided code matches the cached code
                if ($code != $cached_code) {
                    return [
                        'status' => 400,
                        'message' => [
                            'errorDetails' => ["The code you entered is incorrect."],
                        ],
                    ];
                }

                return [
                    'status' => 200,
                    'message' => "The code you entered is correct.",
                ];
            } else {
                // If the code is not found in the cache, it has expired
                return [
                    'status' => 400,
                    'message' => [
                        'errorDetails' => ["The code sent to this account has expired."],
                    ],
                ];
            }
        } catch (Exception $e) {
            // Log the error and return a server error response
            Log::error("Error in checkCode: " . $e->getMessage());

            return [
                'status' => 500,
                'message' => [
                    'errorDetails' => ["There is something wrong on the server."],
                ],
            ];
        }
    }

    /**
     * Change the user's password.
     *
     * @param string $email The email address of the user.
     * @param string $password The new password.
     * @return array An array containing the status and message.
     */
    public function changePassword($email, $password)
    {
        try {
            // Find the user by email
            $user = User::where('email', $email)->first();

            if ($user) {
                // Hash the new password and save it
                $user->password = Hash::make($password);
                $user->save();

                // Delete the cached code after the password is changed
                $key = $email;
                Cache::delete($key);

                return [
                    'status' => 200,
                    'message' => "Password changed successfully.",
                ];
            } else {
                // If the user is not found, return a 404 response
                return [
                    'status' => 404,
                    'message' => [
                        'errorDetails' => ["We didn't find any user with this email."],
                    ],
                ];
            }
        } catch (Exception $e) {
            // Log the error and return a server error response
            Log::error("Error in changePassword: " . $e->getMessage());

            return [
                'status' => 500,
                'message' => [
                    'errorDetails' => ["There is something wrong on the server."],
                ],
            ];
        }
    }
}
