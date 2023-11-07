<?php

namespace App\Http\Requests\Glossary;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGlossaryRequest extends FormRequest
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
        return [
            'word'           => "required|unique:glossaries,word,$id,id",
            'meaning_english'       => 'required',
            'meaning_nepali'        => 'required',
            'status'    => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
