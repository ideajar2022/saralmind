<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'              =>  'required|min:3',
            'username'          =>  'required|min:3|max:15|unique:users',
            'email'             =>  'required|email|unique:users',
            'phone_no'          =>  'nullable|numeric|size:10',
            'password'          =>  'required|confirmed|min:6',
            'status'            =>  'required|in:Active,Inactive'
        ];
    }
}
