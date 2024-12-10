<?php

namespace App\Http\Requests\Auth;

use App\Helpers\Helper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name'        => 'required|string|between:2,100',
            'email'       => 'required|string|email|max:100|unique:users',
            'password'    => 'required|string|confirmed|min:8',
            'google_id'   => 'nullable|string',
            'facebook_id' => 'nullable|string',
            'apple_id'    => 'nullable|string',
            'avatar'      => 'nullable|string',
            'country'     => 'nullable|string|between:2,100',
            'language'    => 'nullable|string|between:2,100',
            'currency'    => 'nullable|string|between:2,100',
        ];
    }

    protected function failedValidation(Validator $validator): void {
        throw new HttpResponseException(
            Helper::jsonResponse(false, 'Validation Failed', 500, ['errors' => $validator->errors()])
        );
    }
}
