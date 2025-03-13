<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\FavoritePersonController;
use App\Http\Controllers\RatingController;
use App\Models\FavoritePerson;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes (no authentication required)

// User login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/loginwithGoogel', [AuthController::class, 'loginwithGoogel']);
// User registration
Route::post('/register', [AuthController::class, 'register']);

// User logout
Route::post('logout', [AuthController::class, 'logout']);

// Refresh JWT token
Route::post('refresh', [AuthController::class, 'refresh']);

// Email verification route
Route::post('/verify-email/{id}', [AuthController::class, 'verify']);

// Change password routes
Route::post('/changePassword', [ForgetPasswordController::class, 'changePassword']);
Route::post('/checkEmail', [ForgetPasswordController::class, 'checkEmail']);
Route::post('/checkCode', [ForgetPasswordController::class, 'checkCode']);

// Protected routes (require authentication)
Route::middleware('auth:api')->group(function () {
    // Get authenticated user details
    Route::get('/me', [ProfileController::class, 'getme']);

    // API resource routes for countries
    // CRUD operations for countries
    Route::apiResource('countries', CountryController::class);

    // API resource routes for cities
    // CRUD operations for cities
    Route::apiResource('cities', CityController::class);

    // API resource routes for trips
    // CRUD operations for trips
    Route::apiResource('trip', TripController::class);

    // API resource routes for profile
    // Update user profile
    Route::put('profile', [ProfileController::class, 'update']);
    Route::apiResource('profile', ProfileController::class);

    // API resource routes for bookings
    // CRUD operations for bookings
    Route::apiResource('booking', BookingController::class);

    // Accept a booking
    Route::post('/booking/{booking}/accept', [BookingController::class, 'accept']);

    // Reject a booking
    Route::post('/booking/{booking}/reject', [BookingController::class, 'reject']);

    Route::apiResource("rating", RatingController::class);

    Route::apiResource("favorite", FavoritePersonController::class);

});
