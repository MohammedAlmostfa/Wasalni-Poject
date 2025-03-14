<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Validator;

class ResendCode extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'email' => 'required|string|email|max:255|unique:users',
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
