<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Hình ảnh đại diện không được để trống.',
            'image.image' => 'Hình ảnh đại diện không hợp lệ.',
            'image.mimes' => 'Hình ảnh đại diện chỉ cho phép jpeg,png,jpg,gif.',
            'image.max' => 'Hình ảnh đại diện có dung lượng nhỏ hơn :max KB.',
        ];
    }
}
