<?php

namespace App\Http\Requests\Frontend\VendorVerification;

use Illuminate\Foundation\Http\FormRequest;

class VendorVerificationStoreRequest extends FormRequest
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
            'id_verification' => ['required', 'image', 'max:2048'],
            'pan_verification' => ['required', 'image', 'max:2048'],
            'irc_verification' => ['required', 'image', 'max:2048'],
            'service_category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }

    /**
     * Get the custom validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'service_category_id.exists' => 'The selected service category is invalid or does not exist.',
            'service_category_id.required' => 'Please select a service category.',
        ];
    }
}
