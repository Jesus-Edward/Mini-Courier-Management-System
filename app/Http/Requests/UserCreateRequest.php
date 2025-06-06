<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserCreateRequest extends FormRequest
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
            'name' => 'required', 'max:255',
            'email' => 'required', 'email', 'lowercase', 'max:255', 'unique:users',
            'password' => 'required', 'min:6', Password::min(6)->mixedCase()->symbols()
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email already taken'
        ] ;
    }
}
