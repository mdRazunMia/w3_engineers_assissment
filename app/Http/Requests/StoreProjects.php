<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjects extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'owner_email' => 'required|email|max:255',
    
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The project name is required.',
            'name.string' => 'The project name must be a string.',
            'name.max' => 'The project name may not be greater than 255 characters.',
            'owner_email.required' => 'The owner email is required.',
            'owner_email.email' => 'The owner email must be a valid email address.',
        ];
    }
}
