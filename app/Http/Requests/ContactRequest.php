<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên',
            'address.required' => 'Bạn phải nhập địa chỉ',
            'phone.required' => 'Bạn phải nhập số điện thoại',
            'mail.required' => 'Bạn phải nhập email ',
            'content.required' => 'Bạn phải nhập nội dung'
        ];
    }
}
