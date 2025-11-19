<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniquePhoneSystem;
use Illuminate\Validation\Rule;
use App\Models\Client\Patients;

class UpdatePatients extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $patientId = $this->route("id");

        $patient = Patients::find($patientId);
        $accountId = $patient ? $patient->accountId : null;

        return [
            'fullName'   => 'required|string|max:255',

            'phone' => [
                'required',
                'string',
                'max:10',
                new UniquePhoneSystem('phone', $patientId),
            ],

            'idCard' => [
                'required',
                'string',
                'max:12',
                Rule::unique('tblpatients', 'idCard')->ignore($patientId, 'patientId'),
            ],

            'birthDate'  => 'required|date',

            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'gender'     => 'required',

            'address'    => 'nullable|string|max:255',

            'password' => 'nullable|string|min:6|confirmed',

            'email' => [
                'required',
                'email',
                Rule::unique('tblaccounts', 'email')->ignore($accountId, 'accountId'),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required' => 'Vui lòng nhập họ tên.',
            'fullName.string'   => 'Họ tên không hợp lệ.',
            'fullName.max'      => 'Họ tên quá dài.',

            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.string'      => 'Số điện thoại không hợp lệ.',
            'phone.max'         => 'Số điện thoại tối đa 10 ký tự.',

            'idCard.required'   => 'Vui lòng nhập số CCCD.',
            'idCard.string'     => 'CCCD không hợp lệ.',
            'idCard.max'        => 'CCCD tối đa 12 ký tự.',
            'idCard.unique'        => 'CCCD đã tồn tại.',

            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh.',
            'birthDate.date'     => 'Ngày sinh không hợp lệ.',

            'gender.required' => 'Vui lòng chọn giới tính.',

            'address.string' => 'Địa chỉ không hợp lệ.',
            'address.max' => 'Địa chỉ quá dài.',

            'password.min' => 'Mật khẩu tối thiểu 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',

            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',

            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
        ];
    }
}
