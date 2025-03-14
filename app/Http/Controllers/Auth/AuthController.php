<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\StorProfileRequest;
use App\Http\Requests\AuthRequest\ResendCode;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Requests\AuthRequest\GoogelloginRequest;
use App\Http\Requests\AuthRequest\VerficationRequest;

class AuthController extends Controller
{
    /**
     * The authentication service instance.
     *
     * @var AuthService
     */
    protected $authService;

    /**
     * Create a new AuthController instance.
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register a new user.
     *
     * @param RegisterRequest $request The request containing user registration data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        // Validate the request data
        $credentials = $request->validated();

        // Call the AuthService to register the user
        $result = $this->authService->register($credentials);

        // Return a success or error response based on the result
        return $result['status'] === 201
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Verify the user's account using the verification code.
     *
     * @param VerficationRequest $request The request containing email and verification code.
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(VerficationRequest $request)
    {
        // Validate the request data
        $validationData = $request->validated();

        // Call the AuthService to verify the account
        $result = $this->authService->verficationacount($validationData);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Resend the verification code to the user's email.
     *
     * @param ResendCode $request The request containing the user's email.
     * @return \Illuminate\Http\JsonResponse
     */
    public function resendCode(ResendCode $request)
    {
        // Validate the request data
        $validationData = $request->validated();

        // Call the AuthService to resend the verification code
        $result = $this->authService->resendCode($validationData);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Login an existing user.
     *
     * @param LoginRequest $request The request containing user login credentials.
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        // Validate the request data
        $credentials = $request->validated();

        // Call the AuthService to login the user
        $result = $this->authService->login($credentials);

        // Return a success or error response based on the result
        return $result['status'] === 201
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Logout the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        // Call the AuthService to logout the user
        $result = $this->authService->logout();

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success(null, $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Refresh the JWT token for the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // Call the AuthService to refresh the token
        $result = $this->authService->refresh();

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Login a user using Google OAuth.
     *
     * @param GoogelloginRequest $request The request containing Google access token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginwithGoogel(GoogelloginRequest $request)
    {
        // Validate the request data
        $validationData = $request->validated();

        // Call the AuthService to login the user using Google
        $result = $this->authService->loginwithgoogel($validationData['googleToken']);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }
}
