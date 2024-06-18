<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Appointment\AppointmentRepositoryInterface;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    private $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    // id: Doctor Id Or User Id
    public function index($id)
    {
        return $this->appointmentRepository->index($id);
    }

    public function create($id)
    {
        return $this->appointmentRepository->create($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        // التحقق من توافر موعد للطبيب
        $doctorAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->exists();

        if ($doctorAppointment) {
            return redirect()->back()->withErrors(['error' => 'The doctor is already booked at this time.']);
        }

        $user_id = auth()->id();
        // التحقق من توافر موعد للمريض
        $patientAppointment = Appointment::where('user_id', $user_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->exists();

        if ($patientAppointment) {
            return redirect()->back()->withErrors(['error' => 'You already have an appointment at this time.']);
        }

        // إذا كان تاريخ الموعد هو اليوم الحالي
        // التحقق من أن الوقت لا يمكن أن يكون قبل الوقت الحالي
        $currentDate = Carbon::now()->timezone('Asia/Damascus')->format('Y-m-d');
        if ($request->appointment_date == $currentDate) {
            $currentTime = Carbon::now()->timezone('Asia/Damascus')->format('H:i');
            if ($request->appointment_time < $currentTime) {
                return redirect()->back()->withErrors(['error' => 'The time cannot be before the current time.']);
            }
        }

        // إذا لم يكن هناك تداخل في المواعيد، يمكن حفظ الموعد
        return $this->appointmentRepository->store($request);
    }

    public function update(Request $request)
    {
        $request->validate([
            'meeting_link' => 'nullable|url',
            'status' => 'required|in:0,1,2,3',
        ]);

        return $this->appointmentRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->appointmentRepository->destroy($request);
    }

}
