<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessionRequest extends FormRequest
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
        $rules = [
            'profession'            => 'required|in:Student,Teacher',
        ];
        if(request('profession') == 'Student'){
            
            $rules = [
                'grades' => 'required|array',
                'grades.*' => 'exists:grades,id', // check each item in the array
            ];
        }else if (request('profession') == 'Teacher') {
            
            $rules = [
                'subjects' => 'required|array',
                'subjects.*' => 'exists:subjects,id', // check each item in the array
            ];
        }
        return $rules;
    }
}
