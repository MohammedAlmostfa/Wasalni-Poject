<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\ProfileSevice;
use App\Http\Requests\Profile\StorProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    protected $profileSevice;

    /**
     * Constructor to inject the ProfileSevice dependency.
     *
     * @param ProfileSevice $profileSevice The profile service instance.
     */
    public function __construct(ProfileSevice $profileSevice)
    {
        $this->profileSevice = $profileSevice;
    }

    /**
     * Store a new profile for the authenticated user.
     *
     * @param StorProfileRequest $request The validated request data.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function store(StorProfileRequest $request)
    {
        $credentials = $request->validated();

        // Call the service to create the profile
        $result = $this->profileSevice->creatAprofile($credentials);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Update the profile of the authenticated user.
     *
     * @param UpdateProfileRequest $request The validated request data.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function update(UpdateProfileRequest $request)
    {
        $credentials = $request->validated();

        // Call the service to update the profile
        $result = $this->profileSevice->updateprfile($credentials);

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }

    /**
     * Get the authenticated user's data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getme()
    {
        // Call the AuthService to get the authenticated user's data
        $result = $this->profileSevice->getme();

        // Return a success or error response based on the result
        return $result['status'] === 200
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }
}
