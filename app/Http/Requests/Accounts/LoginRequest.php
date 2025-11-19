<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|exists:tblaccounts,username',
            'password'=> 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.string'=> 'Bạn nhập sai kiểu dữ liệu',
            'username.exists' => 'Tên đăng nhập không tồn tại',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'pasword.string'=> 'Bạn nhập sai kiểu dữ liệu',
         ];
    }
}
