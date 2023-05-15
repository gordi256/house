<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'latitude' => ['sometimes', 'nullable', 'decimal:2,8', 'min:-90', 'max:90'],
            'longitude' => ['sometimes', 'nullable','decimal:2,8', 'min:-90', 'max:90'],

        ];
    }
}
