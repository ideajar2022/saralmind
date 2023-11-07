<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'name'              => 'required|min:3',
            'email'             => 'required|email|unique:admins',
            'phone_no'          => 'required|numeric|min:10|unique:admins',
            'password'          => 'required|min:6|confirmed',
            'status'            => 'required|in:Active,Inactive' 
        ];
    }
}
