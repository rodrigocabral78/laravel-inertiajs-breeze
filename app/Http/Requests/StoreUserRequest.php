<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => [
                'bail', 'required', 'string', 'min:1', 'max:255'
            ],
            'email'    => [
                'bail', 'required', 'string', 'lowercase', 'email', 'min:1', 'max:255', 'unique:' . User::class,
            ],
            'password' => [
                'bail', 'required', 'confirmed', 'min:6', 'max:10', Rules\Password::defaults(),
            ],
        ];

        // return [
        //     'uuid'              => ['nullable', 'string', 'min:1', 'max:36'],
        //     'name'              => ['required', 'string', 'min:1', 'max:255'],
        //     'email'             => ['required', 'string', 'min:1', 'max:255'],
        //     'email_verified_at' => ['nullable', 'date', 'after_or_equal:1970-01-01 00:00:01', 'before_or_equal:2038-01-19 03:14:07'],
        //     'password'          => ['required', 'string', 'min:1', 'max:255'],
        //     'api_token'         => ['nullable', 'string', 'min:1', 'max:80'],
        //     'remember_token'    => ['nullable', 'string', 'min:1', 'max:100'],
        //     'is_admin'          => ['required', 'boolean'],
        //     'is_active'         => ['required', 'boolean'],
        //     'created_by'        => ['nullable', 'integer', 'min:1'],
        //     'updated_by'        => ['nullable', 'integer', 'min:1']
        // ];
    }
}
