<?php

namespace App\Http\Requests\Box;

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
            'name' => 'required|string|max:255',
            'status' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'vehicle' => 'required|string',
            'people' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhóm không được để trống.',
            'name.string' => 'Tên nhóm phải là một chuỗi.',
            'name.max' => 'Tên nhóm chỉ chứa tối đa :max ký tự.',

            'status.max' => 'Trạng thái nhóm chỉ chứa tối đa :max ký tự.',

            'image.image' => 'Hình ảnh địa danh không hợp lệ.',
            'image.mimes' => 'Hình ảnh địa danh chỉ cho phép jpeg,png,jpg,gif.',
            'image.max' => 'Hình ảnh địa danh có dung lượng nhỏ hơn :max KB.',

            'vehicle.required' => 'Phương tiện di chuyển không được để trống.',
            'vehicle.string' => 'Phương tiện di chuyển phải là một chuỗi.',

            'people.required' => 'Số thành viên nhóm không được để trống.',
            'people.numeric' => 'Số thành viên nhóm phải là một số.',

            'start.required' => 'Ngày bắt đầu không được để trống.',
            'start.date' => 'Ngày bắt đầu phải là một ngày.',

            'end.required' => 'Ngày kết thúc không được để trống.',
            'end.date' => 'Ngày kết thúc phải là một ngày.',
        ];
    }
}
