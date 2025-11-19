<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStaffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $staffId = $this->route("id");

        return [
            'fullName'   => 'required|string',

            'phone' => [
                'required',
                'string',
                'max:10',
                Rule::unique('tblstaff', 'phone')->ignore($staffId, 'staffId')
            ],

            'department' => 'required|string',
            'birthDate'  => 'required',

            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'status'     => 'required|integer',
            'gender'     => 'nullable',
            'position'   => 'nullable',
            'accountId' =>  'integer',
            'serviceId'  => 'nullable',
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
            'phone.max'         => 'Số điện thoại bắt buộc tối đa 10 số.',

            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh.',

            'department.required' => 'Vui lòng nhập phòng ban.',
            'department.string'   => 'Phòng ban không hợp lệ.',

            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
        ];
    }
}
