<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = request()->segment(3);
        $rules = [
            'name'              =>  'required|min:3',
            'phone_no'          =>  'nullable|numeric|digits:10',
            'email'             =>  "required|email|unique:users,email,$id,id",
            'status'            =>  'required|in:Active,Inactive'
        ];

        if(request('update_password_check') == 'yes'){
            $rules['password'] = 'required|min:6|confirmed';
        }
        return $rules;
    }
}
