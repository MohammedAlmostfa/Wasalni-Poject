<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\VerificationController;

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
// Protected routes (require authentication)
Route::middleware('auth:api')->group(function () {
    // Get authenticated user details
    Route::get('/me', [ProfileController::class, 'getme']);

    // API resource routes for countries and cities
    // CRUD operations for countries
    Route::apiResource('countries', CountryController::class);
    // CRUD operations for cities
    Route::apiResource('cities', CityController::class);
    // CRUD operations for trips
    Route::apiResource('trip', TripController::class);
    // CRUD operations for profile
    Route::put('profile', [ProfileController::class,'update']);
    Route::apiResource('profile', ProfileController::class);



});
Route::post('/verify-email/{id}', [VerificationController::class, 'verify']);
