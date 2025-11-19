<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $accountId = $this->route('id');

        return [
            'username' => [
                'required',
                'string',
                Rule::unique('tblaccounts', 'username')->ignore($accountId, 'accountId'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('tblaccounts', 'email')->ignore($accountId, 'accountId'),
            ],
            'password' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
        ];
    }
}
