<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Countries;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * The CountryService instance.
     *
     * @var CountryService
     */
    private $countryService;

    /**
     * Create a new CountryController instance.
     *
     * @param CountryService $countryService
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of all countries.
     *
     * This method retrieves all countries using the CountryService and returns a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve countries using the CountryService
        $result = $this->countryService->getCountries();

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }
}
