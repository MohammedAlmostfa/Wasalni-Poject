<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class RegisterRequest
 *
 * This class handles the validation of user registration requests.
 * It ensures that the necessary data is provided and meets the specified criteria before passing the request to the controller.
 *
 * @package App\Http\Requests\AuthRequest
 */
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool Always returns true, allowing everyone to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow everyone to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * These rules ensure that the request contains a valid name, email, and password.
     *
     * @return array The validation rules for the registration request.
     */
    public function rules(): array
    {
        return [


            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'min:8',
                'string',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
        ];
    }





    /**
     * Handles failed validation attempts.
     * Logs validation failures with relevant details for debugging and monitoring.
     * Excludes sensitive data (password) from logs.
     * Uses parent's failedValidation to maintain consistent error response format.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator): void
    {


        throw new HttpResponseException(response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
        ], 422));
    }
}
