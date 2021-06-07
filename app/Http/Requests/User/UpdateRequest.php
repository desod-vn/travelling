<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'gender' => 'required|string|max:10',
            'phone' => 'required|numeric',
            'birthday' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống.',
            'name.string' => 'Tên người dùng phải là một chuỗi.',
            'name.min' => 'Tên người dùng phải chứa tối thiểu :min ký tự.',
            'name.max' => 'Tên người dùng chỉ chứa tối đa :max ký tự.',

            'gender.required' => 'Giới tính không được để trống.',
            'gender.string' => 'Giới tính phải là một chuỗi.',
            'gender.max' => 'Giới tính chỉ chứa tối đa :max ký tự.',

            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.numeric' => 'Số điện thoại không hợp lệ, vui lòng chỉ nhập số.',

            'birthday.required' => 'Ngày sinh không được để trống.',
            'birthday.date' => 'Ngày sinh không hợp lệ, vui lòng chỉ nhập số.',
        ];
    }
}
