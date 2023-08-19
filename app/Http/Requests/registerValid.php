<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerValid extends FormRequest
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
                'lName' => ['required','min:2'],
                'fName' => ['required','min:2','max:20'],
                'email' => 'required|email|ends_with:@gmail.com',
                'password' => 'required|min:6|same:repass',
                'repass' => 'required|min:6'
        ];
    }
    public function messages() {
        return [
         'lName.required' => 'Phải nhập họ nha bạn ơi',
         'lName.min' => 'Nhập họ ít nhất 2 ký tự',
         'fName.required' => 'Bạn chưa nhập tên',
         'fName.min' => 'Tên cần dài hơn',
         'fName.max' => 'Tên quá dài',
         'email.required' => 'Chưa nhập email',
         'email.email' => 'Nhập email chưa đúng',
         'password.required' => 'Bạn chưa nhập mật khẩu',
         'password.min' => 'Mật khẩu từ 6 ký tự trở lên',
         'password.same' => 'Hai mật khẩu không giống nhau',
         'repass.required' => 'Bạn chưa nhập lại mật khẩu',
         'repass.min' => 'Mật khẩu nhập lại cùng từ 6 ký tự trở lên'
       ];
     }
}
