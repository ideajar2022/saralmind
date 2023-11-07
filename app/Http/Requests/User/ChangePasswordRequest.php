<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;

class ChangePasswordRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->show_password) {
            $rules = [
                'current_password'      => ['required', new MatchOldPassword],
                'new_password'          => 'required|min:5|max:255',
                'new_confirm_password'  => ['same:new_password'],
            ];
        }

        else {
            $rules = [
                'new_password'          => 'required|min:5|max:255',
                'new_confirm_password'  => ['same:new_password'],
            ];
        }

        return $rules;
    }
}
