<?php

namespace App\Http\Requests\Admin\VendorVerificationSetting;

use Illuminate\Foundation\Http\FormRequest;

class VendorVerificationSettingUpdateRequest extends FormRequest
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
            'id_verification' => ['nullable', 'boolean'],
            'pan_verification' => ['nullable', 'boolean'],
            'irc_verification' => ['nullable', 'boolean'],
            'instructions' => ['string', 'max:2000'],
            'auto_approve' => ['nullable', 'boolean'],
            'status' => ['required', 'boolean'],
        ];
    }
}
