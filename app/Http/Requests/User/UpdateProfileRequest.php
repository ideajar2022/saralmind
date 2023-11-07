<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        // $user = User::find($this->users);
        $user = auth()->user();
        if(request('profession') == 'Student'){
            
            $rules = [
                'name'              => 'required|min:3|max:255',
                'username'          => 'required|min:3|max:15|unique:users,username,'.$user->id,
                'email'             => 'required|unique:users,email,'.$user->id,
                'grades'            => 'required|array',
                'phone_no'          => 'nullable|unique:users,phone_no,'.$user->id,
                'grades.*'          => 'exists:grades,id', // check each item in the array
            ];
        }else if (request('profession') == 'Teacher') {
            
            $rules = [
                'name'              => 'required|min:3|max:255',
                'username'          => 'required|min:3|max:15|unique:users,username,'.$user->id,
                'email'             => 'required|unique:users|unique:users,email,'.$user->id,
                'phone_no'          => 'required|unique:users|unique:users,phone_no,'.$user->id,
                'subjects'          => 'required|array',
                'subjects.*'        => 'exists:subjects,id', // check each item in the array
            ];
        }
        return $rules;
    }
}
