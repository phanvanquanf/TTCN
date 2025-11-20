<?php

namespace App\Http\Requests\Staff;

use App\Rules\UniquePhoneSystem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStaffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullName'   => 'required|string',
            'phone'      => ['required', 'string', 'max:10', new UniquePhoneSystem('phone')],
            'birthDate'  => 'required',
            'image'      => 'required|image|mimes:jpg,jpeg,png,webp',
            'status'     => 'required|integer',
            'gender'     => 'nullable',
            'accountId'  => ['required', new UniquePhoneSystem('accountId')],
            'serviceId'  => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required' => 'Vui lòng nhập họ tên.',
            'fullName.string'   => 'Họ tên không hợp lệ.',

            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.unique'      => 'Số điện thoại này đã tồn tại.',
            'phone.string'      => 'Số điện thoại không hợp lệ.',
            'phone.max'         => 'Số điện thoại bắt buộc 10 số.',

            'accountId.required' => 'Vui lòng chọn tài khoản',

            'serviceId.required' => 'Vui lòng chọn dịch vụ',
            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh',

            'image.required' => 'Vui lòng tải ảnh lên',
            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
        ];
    }
}
