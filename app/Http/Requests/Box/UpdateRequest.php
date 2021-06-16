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
            'name' => 'required|string|min:10|max:255',
            'status' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'content' => 'required|string|min:50',
            'vehicle' => 'required|string',
            'people' => 'required|numeric',
            'fee' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhóm không được để trống.',
            'name.string' => 'Tên nhóm phải là một chuỗi.',
            'name.min' => 'Tên nhóm phải chứa tối thiểu :min ký tự.',
            'name.max' => 'Tên nhóm chỉ chứa tối đa :max ký tự.',

            'status.required' => 'Trạng thái nhóm không được để trống.',
            'status.string' => 'Trạng thái nhóm phải là một chuỗi.',
            'status.max' => 'Trạng thái nhóm chỉ chứa tối đa :max ký tự.',

            'image.image' => 'Hình ảnh địa danh không hợp lệ.',
            'image.mimes' => 'Hình ảnh địa danh chỉ cho phép jpeg,png,jpg,gif.',
            'image.max' => 'Hình ảnh địa danh có dung lượng nhỏ hơn :max KB.',

            'content.required' => 'Thông báo nhóm không được để trống.',
            'content.string' => 'Thông báo nhóm phải là một chuỗi.',
            'content.min' => 'Thông báo nhóm phải chứa tối thiểu :min ký tự.',

            'vehicle.required' => 'Phương tiện di chuyển không được để trống.',
            'vehicle.string' => 'Phương tiện di chuyển phải là một chuỗi.',

            'people.required' => 'Số thành viên nhóm không được để trống.',
            'people.numeric' => 'Số thành viên nhóm phải là một số.',

            'fee.required' => 'Chi phí không được để trống.',
            'fee.numeric' => 'Chi phí phải là một số.',

            'fee.required' => 'Chi phí không được để trống.',
            'fee.numeric' => 'Chi phí phải là một số.',

            'start.required' => 'Ngày bắt đầu không được để trống.',
            'start.date' => 'Ngày bắt đầu phải là một ngày.',

            'end.required' => 'Ngày kết thúc không được để trống.',
            'end.date' => 'Ngày kết thúc phải là một ngày.',
        ];
    }
}
