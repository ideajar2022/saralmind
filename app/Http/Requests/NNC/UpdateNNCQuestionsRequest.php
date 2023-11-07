<?php

namespace App\Http\Requests\NNC;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNNCQuestionsRequest extends FormRequest
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
            'question'              => 'required',

            'correct_answer'        => "required|unique:nnc_liscense_questions,correct_answer,$id,id",
        ];
    }
}
