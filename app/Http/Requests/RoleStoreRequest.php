<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ];
    }


    /*
     *
     *  custom messages for validation
     *
     * @return array
     *
     * */
    public function messages()
    {
        return [
            'name' => 'name is required!' ,
            'role.required' => 'role is required!' ,
        ];
    }
}
