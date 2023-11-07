<?php

namespace App\Http\Requests\NoteVideo;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteVideoRequest extends FormRequest
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
            'note_id'     => 'required|exists:notes,id',
            'url'         => [
                'required','active_url','regex:/http:\/\/|https:\/\/(?:www.)?(vimeo|youtube).com\/(?:watch\?v=)?(.*?)(?:\z|&)/','min:3','max:255',
            ],
            'key'         => 'required|min:3|max:255',
            'title'       => 'required|min:3|max:255',
            'status'      => 'required',
        ];
    }
}
