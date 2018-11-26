<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'pass' => 'required',
            'newpass' => 'required',
            'repass' => 'required|same:newpass'
        ];
    }

    public function messages()
    {
        return [
            'pass.required' => 'Bạn chưa nhập mật khẩu cũ',
            'newpass.required' => 'Bạn chưa nhập mật khẩu mới',
            'repass.required' => 'Vui lòng nhập lại mật khẩu',
            'repass.same' => 'Mật khẩu không khớp'
        ];
    }
}
