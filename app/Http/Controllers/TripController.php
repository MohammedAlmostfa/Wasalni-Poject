<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest\FilteringTripsData;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Services\TraipService;
use App\Http\Requests\TripRequest\StoreTripRequest;
use App\Http\Requests\TripRequest\UpdateTripRequest;
use App\Http\Resources\TripResource;
use GuzzleHttp\Psr7\Response;

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
     * @param TraipService $tripService
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(FilteringTripsData $request)
    {
        $validationData = $request->validated();

        // Call the trip service to retrieve all trips
        $result = $this->tripService->showtrips($validationData);
        //return response()->json($validationData);
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
        // Validate the request data
        $validationData = $request->validated();

        // Call the trip service to update the trip
        $result = $this->tripService->updatetrip($validationData, $trip);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }
}
