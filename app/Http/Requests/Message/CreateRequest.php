<?php

namespace App\Http\Requests\Message;

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
            'message' => 'required|string|max:5000',
            'box_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Tin nhắn không được để trống.',
            'message.string' => 'Tin nhắn phải là một chuỗi.',
            'message.max' => 'Tin nhắn chỉ chứa tối đa :max ký tự.',

            'box_id.required' => 'Nhóm sở hữu không được để trống.',
            'box_id.numeric' => 'Nhóm sở hữu phải là một số.',
        ];
    }
}
