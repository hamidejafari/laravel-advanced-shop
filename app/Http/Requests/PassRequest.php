<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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

            'password' => 'required|min:6',
            're-password'=>'required|same:password',

        ];
    }
    public function messages()
    {
        return [

            'password.required' => '🔴 رمز ورود اجباری است',

        ];
    }
}
