<?php

namespace App\Http\Requests\MediaFeed;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaFeedRequest extends FormRequest
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
            'title'        => 'required|min:3|max:255',
            'media'        => 'required|min:3|max:255',
            'url'          => 'required|url',
            'published_at' => 'required|date',
            'status'       => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
