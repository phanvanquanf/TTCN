<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client\Appointments;
use Illuminate\Http\Request;

class AppointmentController extends \Illuminate\Routing\Controller
{

    public function index()
    {
        $appointments = Appointments::with(['patient', 'staff'])
            ->orderBy('appointmentDate', 'desc')
            ->paginate(5);

        return view('admin.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        $appointment = Appointments::with(['patient', 'staff'])
            ->findOrFail($id);

        return view('admin.appointments.show', compact('appointment'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|integer|min:0|max:3',
        ]);

        $appointment = Appointments::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
