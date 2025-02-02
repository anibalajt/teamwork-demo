<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email', //
            'password' => 'required|same:confirm-password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name is required!' ,
            'email.required' => 'Email address is required!' ,
            'password.required' => 'password is required!'
        ];
    }
}
