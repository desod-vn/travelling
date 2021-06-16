<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:places',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên địa danh không được để trống.',
            'name.string' => 'Tên địa danh phải là một chuỗi.',
            'name.min' => 'Tên địa danh phải chứa tối thiểu :min ký tự.',
            'name.max' => 'Tên địa danh chỉ chứa tối đa :max ký tự.',
            'name.unique' => 'Tên địa danh đã tồn tại.',

            'image.required' => 'Hình ảnh địa danh không được để trống.',
            'image.image' => 'Hình ảnh địa danh không hợp lệ.',
            'image.mimes' => 'Hình ảnh địa danh chỉ cho phép jpeg,png,jpg,gif.',
            'image.max' => 'Hình ảnh địa danh có dung lượng nhỏ hơn :max KB.',
        ];
    }
}
