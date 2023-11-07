<?php

namespace App\Http\Requests\CourseTimeline;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseTimelineRequest extends FormRequest
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
            'name'         => 'required|min:3|max:255|unique:course_timelines',
            'status'       => 'required|in:Active,Inactive',
        ];
    }
}
