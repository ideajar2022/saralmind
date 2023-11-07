<?php

namespace App\Http\Requests\StudyPeriodChild;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyPeriodChildRequest extends FormRequest
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
            'name'         => 'required|min:3|max:255|unique:study_period_children',
            'study_period_id'  => 'required|exists:study_periods,id',
            'status'       => 'required|in:Active,Inactive',
        ];
    }
}
