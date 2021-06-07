<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Địa chỉ email không được để trống.',
            'email.string' => 'Địa chỉ email không hợp lệ.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
        ];
    }
}
