<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:tblaccounts,username',
            'email'    => 'required|email|unique:tblaccounts,email',
            'password' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.string'   => 'Tên đăng nhập không hợp lệ.',
            'username.unique'   => 'Tên đăng nhập này đã tồn tại.',

            'email.required'    => 'Vui lòng nhập email.',
            'email.email'       => 'Email không đúng định dạng.',
            'email.unique'      => 'Email này đã được sử dụng.',

            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string'   => 'Mật khẩu không hợp lệ.',
        ];
    }
}
