<?php

namespace App\Containers\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 */
class RegisterRequest extends FormRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'name'     => ['required', 'max:255'],
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
