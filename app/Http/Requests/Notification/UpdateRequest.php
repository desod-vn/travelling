<?php

namespace App\Http\Requests\Notification;

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
            'time' => 'required|string|max:255',
            'action' => 'required|string|max:255',
            'box_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'time.required' => 'Mốc thời gian không được để trống.',
            'time.string' => 'Mốc thời gian phải là một chuỗi.',
            'time.max' => 'Mốc thời gian chỉ chứa tối đa :max ký tự.',

            'action.required' => 'Hoạt động nhóm không được để trống.',
            'action.string' => 'Hoạt động nhóm phải là một chuỗi.',
            'action.max' => 'Hoạt động nhóm chỉ chứa tối đa :max ký tự.',

            'box_id.required' => 'Nhóm sở hữu không được để trống.',
            'box_id.numeric' => 'Nhóm sở hữu phải là một số.',

        ];
    }
}
