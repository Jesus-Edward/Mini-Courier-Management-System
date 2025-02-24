<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminParcelCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'size' => ['required', 'string'],
            'receiver_name' => ['required', 'string', 'max:255'],
            'receiver_location' => ['required', 'string', 'max:255'],
            'estimated_delivery_date' => ['nullable', 'date'],
            'user' => ['nullable', 'integer'],
            'parcel_image' => ['nullable', 'image', 'max:5048', 'mimes:png,jpg,jpeg,gif'],
            'courier' => ['required', 'integer']
        ];
    }
}
