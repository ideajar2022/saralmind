<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
        return [
            'name'     => 'required|min:3|max:255',
            'slug'     => "required|min:3|max:255|unique:lessons,slug,$id,id",
            'program_id'  => 'required|exists:programs,id',
            'grade_id'    => 'required|exists:grades,id',
            'subject_id'  => 'required|exists:subjects,id',
            'status'      => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
