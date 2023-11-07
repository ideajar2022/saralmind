<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
            'title'   => 'required|min:3|max:255',
            'slug'    => 'required|min:3|max:255|unique:notes',
            'program_id'  => 'required|exists:programs,id',
            'grade_id'    => 'required|exists:grades,id',
            'subject_id'  => 'required|exists:subjects,id',
            'lesson_id'   => 'required|exists:lessons,id',
            'description'   => 'required',
            // 'status'      => 'required'
            // 'status'      => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED,IN REVIEW,FOR QUILLBOT'
        ];
    }
}
