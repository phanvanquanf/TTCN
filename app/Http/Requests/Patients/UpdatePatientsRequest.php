<?php

namespace App\Http\Requests\Patients;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniquePhoneSystem;
use Illuminate\Validation\Rule;

class UpdatePatientsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $patientId = $this->route("id");

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
                Rule::unique('tblpatients', 'idCard')->ignore($this->patientId, 'patientId'),
            ],


            'department' => 'required|string',
            'birthDate'  => 'required|date',

            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'status'     => 'required',
            'gender'     => 'required',
            'position'   => 'required',

            'accountId'  => [
                'required',
                new UniquePhoneSystem('accountId', $patientId),
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
            'idCard.unique'        => 'CCCD đã tồn tại',

            'department.required' => 'Vui lòng nhập phòng ban.',
            'department.string'   => 'Phòng ban không hợp lệ.',
            'department.max'      => 'Tên phòng ban quá dài.',

            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh.',
            'birthDate.date'     => 'Ngày sinh không hợp lệ.',

            'accountId.required' => 'Vui lòng chọn tài khoản.',

            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
        ];
    }
}
