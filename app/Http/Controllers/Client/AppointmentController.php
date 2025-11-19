<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Client\Appointments;
use App\Models\Admin\Staff;
use App\Models\Client\Services;

class AppointmentController extends Controller
{
    public function index()
    {
        $account = Auth::user();
        $patient = $account->patient;

        $staffs = Staff::where('position', 0)->get();

        $services = Services::pluck('serviceName', 'serviceId');

        return view('client.appointments.index', compact('patient', 'staffs', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'staffId'        => 'required|integer',
            'serviceId'      => 'required|integer',
            'appointmentDate' => 'required|date',
            'notes'          => 'nullable|string|max:255',
        ]);

        $account = Auth::user();
        $patient = $account->patient;


        Appointments::create([
            'patientId'       => $patient->patientId,
            'staffId'         => $request->staffId,
            'serviceId'       => $request->serviceId,
            'appointmentDate' => $request->appointmentDate,
            'notes'           => $request->notes,
            'status'          => 0,
        ]);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Đặt lịch thành công!');
    }

    public function history()
    {
        $account = Auth::user();
        $patient = $account->patient;

        $appointments = $patient->appointments()
            ->orderBy('appointmentDate', 'desc')
            ->get();

        $services = Services::pluck('serviceName', 'serviceId');

        return view('client.appointments.history', compact('appointments', 'services'));
    }

    public function cancel($id)
    {
        $account = Auth::user();
        $patient = $account->patient;

        $appointment = Appointments::where('appointmentId', $id)
            ->where('patientId', $patient->patientId)
            ->first();

        if (!$appointment) {
            return redirect()->back()->with('error', 'Lịch hẹn không tồn tại.');
        }
        if (in_array($appointment->status, [0])) {
            $appointment->status = 3;
            $appointment->save();

            return redirect()->back()->with('success', 'Lịch hẹn đã được hủy thành công.');
        }

        return redirect()->back()->with('error', 'Lịch hẹn không thể hủy.');
    }
}
