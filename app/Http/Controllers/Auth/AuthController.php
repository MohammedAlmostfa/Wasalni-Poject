<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\StorProfileRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;

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


}
