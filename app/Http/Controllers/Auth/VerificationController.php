<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Services\Auth\VerficatioService;
use App\Http\Requests\AuthRequest\VerficationRequest;

class VerificationController extends Controller
{
    protected $verificationServise;
    public function __construct(VerficatioService $verificationServise)
    {
        $this->verificationServise = $verificationServise;
    }
    /**
     * Verify the user's email using the provided verification code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(VerficationRequest $request)
    {
        // Validate the request data
        $validationData = $request->validated();
        $result=$this->verificationServise->verficationacount($validationData);
        return $result['status'] === 200
                    ? self::success($result['data'], $result['message'], $result['status'])
                    : self::error(null, $result['message'], $result['status']);
    }
}
