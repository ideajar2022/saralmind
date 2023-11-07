<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
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
            'name'       => 'required|min:3|max:255',
            'slug'       => "required|min:3|max:255|unique:partners,slug,$id,id",
            'status'       => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ];
    }
}
