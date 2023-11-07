<?php

namespace App\Http\Requests\NoteSubjectiveQuestion;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteSubjectiveQuestionRequest extends FormRequest
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
            'program_id'  => 'required|exists:programs,id',
            'faculty_id'  => 'required|exists:faculties,id',
            'grade_id'    => 'required|exists:grades,id',
            'subject_id'  => 'required|exists:subjects,id',
            'lesson_id'   => 'required|exists:lessons,id',
            // 'note_id'     => 'required|exists:notes,id',
            'note_id'     => 'exists:notes,id',
            'question'    => 'required|min:3',
            // 'answer'      => 'required|min:3',
            'marks'       => 'nullable|numeric|between:0,30',
            'type'        => 'required|in:VERYSHORT,SHORT,LONG,VERYLONG',
            'difficulty_level' => 'required|in:EASY,MEDIUM,HARD',
            'status'      => 'required',
            // 'status'      => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
