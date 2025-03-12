<?php

namespace App\Services;

use Exception;
use App\Models\City;
use App\Models\Trip;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TraipService
{
    /**
     * Retrieve all trips with optional filtering.
     *
     * This method retrieves all trips, optionally filtered by the provided data, and returns a paginated response.
     *
     * @param array $filteringData The filtering criteria.
     * @return array Returns an array containing the result of the operation.
     *               - 'message': A message describing the outcome.
     *               - 'data': The paginated list of trips.
     *               - 'status': The HTTP status code (200 for success, 500 for error).
     */
    public function showtrips($filteringData)
    {
        try {
            // Retrieve and filter trips
            $trips = Trip::filter(Trip::query(), $filteringData)->paginate(10);

            return [
                'message' => 'All trips retrieved successfully',
                'data' => $trips,
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in showtrips: ' . $e->getMessage());

            return [
                'message' => 'An error occurred while retrieving trips',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    /**
     * Create a new trip.
     *
     * This method creates a new trip using the provided data.
     *
     * @param array $data The trip data.
     * @return array Returns an array containing the result of the operation.
     *               - 'message': A message describing the outcome.
     *               - 'data': The created trip.
     *               - 'status': The HTTP status code (200 for success, 500 for error).
     */
    public function creattrip($data)
    {
        try {
            // Create a new trip
            $trip = Trip::create([
                'description' => $data['description'],
                'trip_start' => $data['trip_start'],
                'from' => $data['from'],
                'to' => $data['to'],
                'status' => $data['status'],
                'seat_price' => $data['seat_price'],
                'available_seats' => $data['available_seats'],
                'user_id' => Auth::user()->id,
            ]);

            // Retrieve city names for 'from' and 'to' fields
            $fromCity = City::find($data['from']);
            $toCity = City::find($data['to']);
            $trip->from = $fromCity->city_name;
            $trip->to = $toCity->city_name;

            return [
                'message' => 'Trip created successfully',
                'status' => 200,
                'data' => $trip,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in creattrip: ' . $e->getMessage());

            return [
                'message' => 'An error occurred while creating the trip',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    /**
     * Update the trip details.
     *
     * This method updates the trip details based on the provided data.
     * If a specific field is not provided in the data, the existing value of the trip is retained.
     *
     * @param array $data The data to update the trip with.
     * @param Trip $trip The trip model to be updated.
     * @return array Returns an array containing the result of the operation.
     *               - 'message': A message describing the outcome.
     *               - 'data': The updated trip data or null if an error occurred.
     *               - 'status': The HTTP status code (200 for success, 500 for error).
     */
    public function updatetrip($data, Trip $trip)
    {
        try {
            // Update the trip with the provided data
            $trip->update([
                'description' => $data['description'] ?? $trip->description,
                'trip_start' => $data['trip_start'] ?? $trip->trip_start,
                'from' => $data['from'] ?? $trip->from,
                'to' => $data['to'] ?? $trip->to,
                'status' => $data['status'] ?? $trip->status,
                'seat_price' => $data['seat_price'] ?? $trip->seat_price,
                'available_seats' => $data['available_seats'] ?? $trip->available_seats,
            ]);

            return [
                'message' => 'Trip updated successfully',
                'data' => $trip,
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in updatetrip: ' . $e->getMessage());

            return [
                'message' => 'An error occurred while updating the trip',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    /**
     * Delete a trip.
     *
     * This method deletes the specified trip. If the deletion is successful,
     * it returns a success response. If an exception occurs, it logs the error
     * and returns an error response.
     *
     * @param Trip $trip The trip to be deleted.
     * @return array Returns an array containing the result of the operation.
     *               - 'message': A message describing the outcome.
     *               - 'status': The HTTP status code (200 for success, 500 for error).
     */
    public function delettrip(Trip $trip)
    {
        try {
            // Delete the trip
            $trip->delete();

            return [
                'message' => 'Trip deleted successfully',
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in deletetrip: ' . $e->getMessage());

            return [
                'message' => 'An error occurred while deleting the trip',
                'data' => null,
                'status' => 500,
            ];
        }
    }
}
