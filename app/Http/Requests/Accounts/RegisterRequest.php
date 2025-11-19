<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniquePhoneSystem;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|unique:tblaccounts,username',
            'email' => 'required|email|unique:tblaccounts,email',
            'password' => 'required|string|confirmed',

            'fullName'   => 'required|string',
            'gender'      => 'nullable',
            'birthDate'  => 'required|date',
            'address'    => 'required|string',
            'phone'      => ['required', 'string', 'max:10', new UniquePhoneSystem('phone')],
            'idCard'     => ['required', 'string', 'max:12', 'unique:tblpatients,idCard'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.string' => 'Bạn nhập sai kiểu dữ liệu',
            'username.unique' => 'Tên đăng nhập đã tồn tại',

            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Bạn nhập sai kiểu dữ liệu',
            'email.unique' => 'Email đã tồn tại',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'pasword.string' => 'Bạn nhập sai kiểu dữ liệu',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp',

            'idCard.required' => 'Vui lòng nhập số CCCD.',
            'idCard.string'   => 'CCCD không hợp lệ.',
            'idCard.max'      => 'CCCD tối đa 12 ký tự.',
            'idCard.unique'   => 'CCCD đã tồn tại.',

            'fullName.required' => 'Vui lòng nhập họ tên.',
            'fullName.string'   => 'Họ tên không hợp lệ.',

            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh.',
            'birthDate.date'     => 'Ngày sinh không hợp lệ.',

            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string'   => 'Địa chỉ không hợp lệ.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string'   => 'Số điện thoại không hợp lệ.',
            'phone.max'      => 'Số điện thoại tối đa 10 ký tự.',
        ];
    }
}
