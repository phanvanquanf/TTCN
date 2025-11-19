<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\UpdatePatients;
use App\Models\Client\Patients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function profile($id)
    {
        $accountId = Auth::user()->accountId;

        $patient = Patients::with('account')->where('patientId', $id)
            ->where('accountId', $accountId)
            ->firstOrFail();

        return view('client.patients.profile', compact('patient'));
    }

    public function update(UpdatePatients $request, $id)
    {
        $patient = Patients::findOrFail($id);
        $account = Accounts::findOrFail($patient->accountId);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($patient->image && file_exists(public_path('client/assets/img/patients/' . $patient->image))) {
                unlink(public_path('client/assets/img/patients/' . $patient->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('client/assets/img/patients');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath);
            }

            $file->move($destinationPath, $filename);
            $data['image'] = $filename;
        } else {
            unset($data['image']);
        }

        $patient->update([
            'fullName' => $data['fullName'],
            'phone' => $data['phone'],
            'idCard' => $data['idCard'],
            'birthDate' => $data['birthDate'],
            'gender' => $data['gender'],
            'address' => $data['address'] ?? $patient->address,
            'image' => $data['image'] ?? $patient->image,
        ]);

        $account->email = $data['email'];

        if (!empty($data['password'])) {
            $account->password = Hash::make($data['password']);
        }

        $account->save();

        return redirect()->route('patient.profile', $patient->patientId)->with('success', 'Cập nhật thông tin thành công!');
    }
}