<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCateValid extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'ten_loai' => ['required', 'min:2', 'max:50'],
            'thutu' => ['required', 'min:0', 'max:10'],

        ];
    }
    public function messages()
    {
        return [
            'ten_loai.required' => 'Không được bỏ trống Name',
            'ten_loai.min' => 'Nhập ít nhất 2 ký tự',
            'ten_loai.max' => 'Không được nhập quá 50 kí tự',
            'thutu.required' => 'Không được bỏ trống Arrange',
            'thutu.min' => 'Nhập Arrange từ 0-10 số',
            'thutu.max' => 'Nhập Arrange từ 0-10 số',
        ];
    }
}