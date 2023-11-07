<?php

namespace App\Http\Requests\Inquiry;

use Illuminate\Foundation\Http\FormRequest;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

class StoreInquiryRequest extends FormRequest
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
            // 'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')],
            'name'          => 'required|min:3|max:255',
            'email'         => 'required|min:3|max:255|email',
            'subject'       => 'required|in:General Inquiry,Educational Tablets/Apps,saralmind.com Features,IT Partnership,Advertising with us,Software Training',
            'contact_no'    => 'nullable|numeric|digits:10',
            'message'       => 'nullable|min:3|max:1000',
        ];
    }
}
