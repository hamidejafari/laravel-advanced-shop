<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'repassword' => 'required|same:password',
        ];

    }
    public function messages()
    {
        return [
            'password.required' => '  پسورد اجباری است',
            'password.min' => ' پسورد حداقل باید 6 حرف باشد',
            'repassword.required' => '  تکرار پسورد اجباری است',
            'repassword.same' => '  تکرار پسورد با پسورد مغایرت دارد',


        ];
    }
}
