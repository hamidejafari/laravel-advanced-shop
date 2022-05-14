<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'email.required' => '🔴  ایمیل اجباری است',
            'password.required' => '🔴 رمز ورود اجباری است',
            'g-recaptcha-response.required' => 'کپچا اجباری است',
            'g-recaptcha-response.captcha' => 'کپچا درست وارد نشده است',
        ];
    }
}
