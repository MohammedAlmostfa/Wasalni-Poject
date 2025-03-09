<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Services\CityService;

class CityController extends Controller
{
    /**
     * The CityService instance.
     *
     * @var CityService
     */
    private $cityService;

    /**
     * Create a new CityController instance.
     *
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the cities.
     *
     * This method retrieves all cities using the CityService and returns a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve cities using the CityService
        $result = $this->cityService->getCities();

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }
}
