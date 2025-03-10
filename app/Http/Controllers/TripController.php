<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Services\TraipService;
use App\Http\Requests\TripRequest\StoreTripRequest;
use App\Http\Requests\TripRequest\UpdateTripRequest;

class TripController extends Controller
{
    protected $traipService;
    public function __construct(TraipService $traipService)
    {
        $this->traipService = $traipService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreTripRequest $request)
    {
        // Validate the request data
        $validationData = $request->validated();

        // Call the service to create the trip
        $result = $this->traipService->creattrip($validationData);

        // Return the response
        return $result['status'] === 200
              ? self::success($result['data'], $result['message'], $result['status'])
              : self::error(null, $result['message'], $result['status']);

    }
    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $validationData = $request->validated();
        $result = $this->traipService->updatetrip($validationData, $trip);

        return $result['status'] === 200
                   ? self::success($result['data'], $result['message'], $result['status'])
                   : self::error(null, $result['message'], $result['status']);

    }


}
