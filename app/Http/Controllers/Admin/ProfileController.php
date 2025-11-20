<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Staff;
use App\Http\Requests\Staff\UpdateStaffRequest;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index($id)
    {
        $staff = Staff::with(['services', 'account'])->findOrFail($id);

        if (!$staff) {
            return back()->with('error', 'Không có thông tin.');
        }

        return view('admin.profile.index', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'fullName'  => 'required|string|max:255',
            'phone'     => ['required', 'string', 'max:10', Rule::unique('tblstaff', 'phone')
                ->ignore($staff->staffId, 'staffId')],
            'birthDate' => 'required|date',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'fullName.required'  => 'Vui lòng nhập họ tên.',
            'fullName.string'    => 'Họ tên không hợp lệ.',
            'phone.required'     => 'Vui lòng nhập số điện thoại.',
            'phone.unique'       => 'Số điện thoại này đã tồn tại.',
            'phone.max'          => 'Số điện thoại tối đa 10 ký tự.',
            'birthDate.required' => 'Vui lòng chọn ngày/tháng/năm sinh.',
            'birthDate.date'     => 'Ngày sinh không hợp lệ.',
            'image.image'        => 'File tải lên phải là hình ảnh.',
            'image.mimes'        => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
            'image.max'          => 'Kích thước ảnh tối đa 2MB.',
        ]);

        $staffData = $request->only(['fullName', 'phone', 'birthDate']);

        if ($request->hasFile('image')) {
            if (!empty($staff->image)) {
                $oldPath = public_path("admin/assets/img/staff/doctor/{$staff->image}");
                if (file_exists($oldPath)) unlink($oldPath);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path("admin/assets/img/staff/doctor");

            if (!file_exists($destinationPath)) mkdir($destinationPath);

            $file->move($destinationPath, $filename);
            $staffData['image'] = $filename;
        }

        $staff->update($staffData);

        return back()->with('success', 'Cập nhật thông tin thành công!');
    }


    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:6|max:32',
        ]);

        $staff = Staff::with('account')->findOrFail($id);

        if (!$staff->account) {
            return back()->with('error', 'Nhân viên này chưa có tài khoản!');
        }

        \App\Models\Accounts::where('accountId', $staff->account->accountId)->update([
            'password' => \Illuminate\Support\Facades\Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }
}
