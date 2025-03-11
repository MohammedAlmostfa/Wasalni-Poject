<?php

namespace App\Services;

use Exception;
use App\Models\City;
use App\Models\Trip;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TraipService
{
    public function showtrips($filteringData)
    {
        try {
            $trips = Trip::Filter(Trip::query(), $filteringData)->paginate(10);
            return [
                'message' => 'All trips retrieved successfully',
                'data' => $trips,
                'status' => 200,
            ];
        } catch (Exception $e) {
            Log::error('Error in showtrips: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while retrieving trips',
                'data' => null,
                'status' => 500,
            ];
        }
    }
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
            $fromCity = City::find($data['from']);
            $toCity = City::find($data['to']);
            $trip->from = $fromCity->city_name;
            $trip->to = $toCity->city_name;


            return [
                'message' => "Trip created successfully",
                'status' => 200,
                'data' => $trip,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in creattrip: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'An error occurred while creating the trip',
                'data' => null,
                'status' => 500,
            ];
        }
    }
    public function updatetrip($data, Trip $trip)
    {
        $trip->update(['description' => $data['description']??$trip->description,
                        'trip_start' => $data['trip_start']??$trip->trip_start,
                        'from' => $data['from']??$trip->from,
                        'to' => $data['to']??$trip->to,
                        'status' => $data['status']??$trip->status,
                        'seat_price' => $data['seat_price']??$trip->seat_price,
                        'available_seats' => $data['available_seats']??$trip->available_seats,
                    ]);
    }
}
