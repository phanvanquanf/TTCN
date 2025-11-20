<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Staff\StoreStaffRequest;
use App\Http\Requests\Staff\UpdateStaffRequest;
use App\Models\Accounts;
use App\Models\Admin\Staff;
use App\Models\Client\Patients;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Client\Services;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $query = Staff::query();

        if ($request->has('input') && $request->input('input') != '') {
            $input = $request->input('input');
            $query->where('fullName', 'LIKE', "%{$input}%")
                ->orWhere('phone', 'LIKE', "%{$input}%");
        }

        $staffs = $query->orderBy('staffId', 'desc')->paginate(5);

        if ($request->has('input')) {
            $staffs->appends(['input' => $request->input('input')]);
        }

        return view('admin.staff.index', compact('staffs'));
    }

    public function show($id)
    {
        $staff = Staff::with('account')->findOrFail($id);
        return view('admin.staff.show', compact('staff'));
    }

    public function create()
    {
        $usedByPatients = Patients::pluck('accountId')->toArray();

        $usedByStaff = Staff::pluck('accountId')->toArray();

        $blockedAccountIds = array_merge($usedByPatients, $usedByStaff);

        $accounts = Accounts::where('status', 0)
            ->where('role', 1)
            ->whereNotIn('accountId', $blockedAccountIds)
            ->orderBy('username')
            ->get();


        $empty = $accounts->isEmpty();
        $services = Services::orderBy('serviceName')->get();
        return view('admin.staff.create', compact('accounts', 'empty', 'services'));
    }

    public function store(StoreStaffRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalExtension();

            $destinationPath = public_path("admin/assets/img/staff/doctor");

            $file->move($destinationPath, $filename);

            $data['image'] = $filename;
        }
        Staff::create($data);

        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        $usedByPatients = Patients::pluck('accountId')->toArray();

        $usedByOtherStaff = Staff::where('staffId', '!=', $id)
            ->pluck('accountId')
            ->toArray();

        $blockedAccountIds = array_merge($usedByPatients, $usedByOtherStaff);

        $accounts = Accounts::where('status', 0)
            ->where('role', 1)
            ->where(function ($q) use ($blockedAccountIds, $staff) {
                $q->whereNotIn('accountId', $blockedAccountIds)
                    ->orWhere('accountId', $staff->accountId);
            })
            ->orderBy('username')
            ->get();

        $services = Services::orderBy('serviceName')->get();

        return view('admin.staff.edit', compact('staff', 'accounts', 'services'));
    }


    public function update(UpdateStaffRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staffData = $request->validated();

        if ($request->hasFile('image')) {
            if (!empty($staff->image)) {
                $oldPath = public_path("admin/assets/img/staff/doctor/{$staff->image}");
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path("admin/assets/img/staff/doctor");

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath);
            }

            $file->move($destinationPath, $filename);
            $staffData['image'] = $filename;
        }

        $staff->update($staffData);

        return redirect()->route('staff.index')->with('success', 'Cập nhật nhân viên thành công.');
    }


    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);

        $staff->delete();

        return redirect()->route('staff.index');
    }
}
