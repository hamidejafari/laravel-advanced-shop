<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3',
            'family' => 'required|min:3',
            'mobile' => 'unique:users',
            'password' => 'required|min:6',
            're-password'=>'required|same:password',
            'gender'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => '🔴  نام اجباری است',
            'family.required' => '🔴  نام خانوادگی اجباری است',
            'mobile.unique' => '🔴  شماره تکراری است',
            'gender.required' => '🔴  جنسیت اجباری است',
            'password.required' => '🔴 رمز ورود اجباری است',
            're-password.required' => '🔴 تکرار رمز ورود اجباری است',
            're-password.same' => '🔴 تکرار رمز ورود  و رمز ورود مشابه نیستند',
        ];
    }
}
