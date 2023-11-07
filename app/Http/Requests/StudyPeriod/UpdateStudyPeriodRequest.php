<?php

namespace App\Http\Requests\StudyPeriod;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudyPeriodRequest extends FormRequest
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
            'name'         => "required|min:3|max:255|unique:study_periods,name,$id,id",
            'status'       => 'required|in:Active,Inactive',
        ];
    }
}
