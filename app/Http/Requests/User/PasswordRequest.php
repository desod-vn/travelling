<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'oldPassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required' => 'Mật khẩu cũ không được để trống.',

            'password.required' => 'Mật khẩu mới không được để trống.',
            'password.string' => 'Mật khẩu mới phải là một chuỗi.',
            'password.min' => 'Mật khẩu mới phải chứa tối thiểu :min ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu mới không chính xác, vui lòng kiểm tra lại.',

            'password_confirmation.required' => 'Xác nhận mật khẩu không được để trống.',
            'password_confirmation.string' => 'Xác nhận mật khẩu phải là một chuỗi.',
            'password_confirmation.min' => 'Xác nhận mật khẩu phải chứa tối thiểu :min ký tự.',
        ];
    }
}
