<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Services\Auth\ForgetPasswordService;
use App\Http\Requests\ForgetPassword\CheckUserCodeRequest;
use App\Http\Requests\ForgetPassword\CheckUserEmailRequest;
use App\Http\Requests\ForgetPassword\CheckUserPasswordRequest;

class ForgetPasswordController extends Controller
{
    protected $forgetPasswordService;
    public function __construct(ForgetPasswordService $forgetPasswordService)
    {
        $this->forgetPasswordService = $forgetPasswordService;
    }
    /**
     * check email
     * @param CheckUserEmailRequest request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmail(CheckUserEmailRequest $request)
    {
        $email = $request->validated()['email'];
        $result = $this->forgetPasswordService->checkEmail($email);
        return $result['status'] === 201
           ? self::success($result['data'], $result['message'], $result['status'])
           : self::error(null, $result['message'], $result['status']);
    }

    /**
     * check code
     * @param CheckUserCodeRequest request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkCode(CheckUserCodeRequest $request)
    {
        $email = $request->validated()['email'];
        $code = $request->validated()['code'];
        $result = $this->forgetPasswordService->checkCode($email, $code);
        return $result['status'] === 201
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);
    }


    /**
     * change password
     * @param CheckUserPasswordRequest request
     * @return \Illuminate\Http\JsonResponse
     */

    public function changePassword(CheckUserPasswordRequest $request)
    {
        $email = $request->validated()['email'];
        $code = $request->validated()['code'];
        $password = $request->validated()['password'];
        $result =$this->forgetPasswordService->changePassword($email, $password, $code);
        return $result['status'] === 201
            ? self::success($result['data'], $result['message'], $result['status'])
            : self::error(null, $result['message'], $result['status']);

    }
}
