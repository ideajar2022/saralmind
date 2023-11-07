<?php

namespace App\Http\Requests\Faculty;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacultyRequest extends FormRequest
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
                'slug'                      => 'required|min:3|max:255|unique:faculties',
                'program_id'                => 'required|exists:programs,id',
                'status'                    => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
                'study_period_parent_id'    => 'required|exists:course_timelines,id',
        ];
    }
}
