<?php

namespace App\Http\Requests\NoteObjectiveQuestion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteObjectiveQuestionRequest extends FormRequest
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
            'class_id'    => 'required|exists:classes,id',
            'subject_id'  => 'required|exists:subjects,id',
            'lesson_id'   => 'required|exists:lessons,id',
            'note_id'     => 'required|exists:notes,id',
            'question'              => 'required|min:3',
            'correct_answer'        => 'required',
            'option_1'              => 'required',
            'option_2'              => 'required',
            'option_3'              => 'required',
            'marks'       => 'nullable|numeric|between:0,30',
            'difficulty_level' => 'required|in:EASY,MEDIUM,HARD',
            'status'      => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
