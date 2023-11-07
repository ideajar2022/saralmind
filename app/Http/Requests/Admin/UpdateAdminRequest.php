<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
        $id     = request()->segment(3);
        $rules = [
            'name'              => 'required|min:3',
            'email'             => "required|email|unique:admins,email,$id,id",
            'phone_no'          => "required|numeric|min:10|unique:admins,phone_no,$id,id",
            'status'            => 'required|in:Active,Inactive',
        ];
        if(request('update_password_check') == 'yes'){
            $rules['password'] = 'required|min:6|confirmed';
        }
        return $rules;
    }
}
