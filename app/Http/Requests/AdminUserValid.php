<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserValid extends FormRequest
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
            'ho' => ['required','min:2'],
            'ten' => ['required','min:2','max:20'],
            'hinh' => ['required','max:100'],
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'required|min:6',
            'diachi' => ['required','min:10','max:60'],
            'dienthoai' => ['required','digits_between:10,11'],


        ];
    }
    public function messages() {
        return [
         'ho.required' => 'Không được bỏ trống',
         'ho.min' => 'Nhập họ ít nhất 2 ký tự',
         'ten.required' => 'Không được bỏ trống',
         'ten.min' => 'Nhập name từ 2-20 kí tự',
         'ten.max' => 'Nhập name từ 2-20 kí tự',
         'hinh.required' => 'Không được bỏ trống',
         'hinh.max' => 'Nhập không quá 100 kí tự',
         'email.required' => 'Chưa nhập email',
         'email.email' => 'Nhập email chưa đúng',
         'email.ends_with' => 'Email phải có đuôi là gmail.com',
         'password.required' => 'Không được bỏ trống',
         'password.min' => 'Mật khẩu từ 6 ký tự trở lên',
         'diachi.required' => 'Không được bỏ trống',
         'diachi.min' => 'Nhập dia chi từ 10-60 kí tự',
         'diachi.max' => 'Nhập dia chi từ 10-60 kí tự',
         'dienthoai.required' => 'Không được bỏ trống',
         'dienthoai.digits_between' => 'Phone phải từ 10-11 số'
       ];
    }
}
