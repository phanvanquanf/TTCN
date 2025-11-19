<?php

namespace App\Http\Requests\Patients;

use App\Rules\UniquePhoneSystem;
use Illuminate\Foundation\Http\FormRequest;

class StorePatientsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullName'     => ['required', 'string'],
            'phone'        => ['required', 'string', 'max:10', new UniquePhoneSystem('phone')],
            'idCard'       => ['required', 'string', 'max:12', 'unique:tblpatients,idCard'],
            'birthDate'    => ['required', 'date'],
            'gender'       => ['nullable'],
            'address'      => ['required', 'string'],
            'status'       => ['required'],
            'accountId'    => ['required'],
            'checkinDate'  => ['required', 'date'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    public function messages(): array
    {
        return [
            'checkinDate.required' => 'Vui lòng chọn ngày khám.',
            'checkinDate.date'     => 'Ngày khám không hợp lệ.',

            'fullName.required' => 'Vui lòng nhập họ tên.',
            'fullName.string'   => 'Họ tên không hợp lệ.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string'   => 'Số điện thoại không hợp lệ.',
            'phone.max'      => 'Số điện thoại tối đa 10 ký tự.',

            'address.required' => 'Vui lòng nhập địa chỉ.',

            'idCard.required' => 'Vui lòng nhập số CCCD.',
            'idCard.string'   => 'CCCD không hợp lệ.',
            'idCard.max'      => 'CCCD tối đa 12 ký tự.',
            'idCard.unique'   => 'CCCD đã tồn tại.',

            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh.',
            'birthDate.date'     => 'Ngày sinh không hợp lệ.',

            'accountId.required' => 'Vui lòng chọn tài khoản.',

            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
        ];
    }
}
