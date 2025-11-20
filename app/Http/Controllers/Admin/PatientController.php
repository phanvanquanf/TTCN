<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Patients\StorePatientsRequest;
use App\Http\Requests\Patients\UpdatePatientsRequest;
use App\Models\Accounts;
use App\Models\Admin\Staff;
use App\Models\Client\Patients;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patients::query();

        if ($request->has("input") && $request->input("input") != "") {
            $input = $request->input("input");
            $query = $query->where("fullName", "LIKE", "%{$input}%")
                ->orwhere("idCard", "LIKE", "%{$input}%")
                ->orwhere("phone", "LIKE", "%{$input}%");
        }

        $patients = $query->orderBy("patientId", "desc")->paginate(5);


        if ($request->has('input')) {
            $patients->appends(['input' => $request->input('input')]);
        }

        return view('admin.patients.index', compact('patients'));
    }

    public function show($id)
    {
        $patient = Patients::with('account')->findOrFail($id);
        return view('admin.patients.show', compact('patient'));
    }

    public function create()
    {
        $usedByPatients = Patients::pluck('accountId')->toArray();
        $usedByStaff = Staff::pluck('accountId')->toArray();

        $blockedAccountIds = array_merge($usedByPatients, $usedByStaff);

        $accounts = Accounts::where('status', 0)
            ->whereNotIn('accountId', $blockedAccountIds)
            ->orderBy('username')
            ->get();

        $empty = $accounts->isEmpty();

        return view('admin.patients.create', compact('accounts', 'empty'));
    }


    public function store(StorePatientsRequest $request)
    {
        $data = $request->validated();

        // Xử lý ảnh nếu có
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path("client/assets/img/patients");

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $data['image'] = $filename;
        }

        Patients::create($data);

        return redirect()->route('patients.index')
            ->with('success', 'Thêm bệnh nhân thành công!');
    }


    public function edit($id)
    {
        $patients = Patients::findOrFail($id);

        $usedByPatients = Patients::where('patientId', '!=', $id)
            ->pluck('accountId')
            ->toArray();

        $usedByStaff = Staff::pluck('accountId')->toArray();

        $blockedAccountIds = array_merge($usedByPatients, $usedByStaff);

        $accounts = Accounts::where('status', 0)
            ->where(function ($q) use ($blockedAccountIds, $patients) {
                $q->whereNotIn('accountId', $blockedAccountIds);

                if ($patients->accountId) {
                    $q->orWhere('accountId', $patients->accountId);
                }
            })
            ->orderBy('username')
            ->get();

        return view('admin.patients.edit', compact('patients', 'accounts'));
    }

    public function update(UpdatePatientsRequest $request, $id)
    {
        $patients = Patients::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($patients->image && file_exists(public_path('client/assets/img/patients/' . $patients->image))) {
                unlink(public_path('client/assets/img/patients/' . $patients->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('client/assets/img/patients');

            $file->move($destination, $filename);
            $data['image'] = $filename;
        } else {
            // Giữ ảnh cũ
            $data['image'] = $patients->image;
        }

        $patients->update($data);


        return redirect()->route('patients.index');
    }
    public function destroy($id)
    {
        Patients::destroy($id);
        return redirect()->route('patients.index');
    }
}
