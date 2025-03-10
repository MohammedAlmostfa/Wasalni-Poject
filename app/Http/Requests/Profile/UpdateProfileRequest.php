<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            "gender" => 'nullable',
            'birthday' => 'nullable|date|before:-13 years',
            'phone' => 'nullable|regex:/\+963\d{9}/',
            'address' => 'nullable|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'country_id'=>'nullable|exists:countries,id',
        ];

    }
}
