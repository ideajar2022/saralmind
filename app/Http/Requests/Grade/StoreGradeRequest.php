<?php

namespace App\Http\Requests\Grade;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'name'                      => 'required|min:3|max:255',
            'slug'                      => 'required|min:3|max:255|unique:grades',
            'program_id'                => 'required|exists:programs,id',
            'faculty_id'                => 'required|exists:faculties,id',
            'status'       => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
