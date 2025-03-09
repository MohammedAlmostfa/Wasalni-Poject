<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;

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

// User registration
Route::post('/register', [AuthController::class, 'register']);
// User logout
Route::post('logout', [AuthController::class, 'logout']);
// Refresh JWT token
Route::post('refresh', [AuthController::class, 'refresh']);
// Protected routes (require authentication)
Route::middleware('auth:api')->group(function () {
    // Get authenticated user details
    Route::get('/me', [AuthController::class, 'getme']);

    // API resource routes for countries and cities
    // CRUD operations for countries
    Route::apiResource('countries', CountryController::class);
    // CRUD operations for cities
    Route::apiResource('cities', CityController::class);
});
