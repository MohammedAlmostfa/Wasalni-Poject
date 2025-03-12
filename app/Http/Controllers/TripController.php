<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest\FilteringTripsData;
use App\Models\Trip;
use App\Services\TraipService;
use App\Http\Requests\TripRequest\StoreTripRequest;
use App\Http\Requests\TripRequest\UpdateTripRequest;
use App\Http\Resources\TripResource;

class TripController extends Controller
{
    /**
     * The trip service instance.
     *
     * @var TraipService
     */
    protected $tripService;

    /**
     * Create a new TripController instance.
     *
     * @param TraipService $tripService The trip service instance.
     */
    public function __construct(TraipService $tripService)
    {
        $this->tripService = $tripService;
    }

    /**
     * Display a listing of the trips.
     *
     * This method retrieves all trips using the trip service and returns a paginated response.
     *
     * @param FilteringTripsData $request The request containing filtering data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(FilteringTripsData $request)
    {
        // Validate the request data
        $validationData = $request->validated();

        // Call the trip service to retrieve all trips
        $result = $this->tripService->showtrips($validationData);

        // Return a paginated response if the status is 200, otherwise return an error response
        return $result['status'] === 200
            ? $this->paginated($result['data'], TripResource::class, $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Store a newly created trip in storage.
     *
     * This method validates the request data and creates a new trip using the trip service.
     *
     * @param StoreTripRequest $request The request containing trip data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTripRequest $request)
    {
        // Validate the request data
        $validationData = $request->validated();

        // Call the trip service to create the trip
        $result = $this->tripService->creattrip($validationData);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Update the specified trip in storage.
     *
     * This method validates the request data and updates the specified trip using the trip service.
     *
     * @param UpdateTripRequest $request The request containing updated trip data.
     * @param Trip $trip The trip to be updated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTripRequest $request, Trip $trip)
    {
        // Authorize the user to update the trip
        $this->authorize('update', $trip);

        // Validate the request data
        $validationData = $request->validated();

        // Call the trip service to update the trip
        $result = $this->tripService->updatetrip($validationData, $trip);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Delete the specified trip from storage.
     *
     * This method authorizes the user to delete the trip and calls the trip service to perform the deletion.
     *
     * @param Trip $trip The trip to be deleted.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Trip $trip)
    {
        // Authorize the user to delete the trip
        $this->authorize('delete', $trip);

        // Call the trip service to delete the trip
        $result = $this->tripService->delettrip($trip);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success(null, $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    public function endingTrip()
    {

    }
}
