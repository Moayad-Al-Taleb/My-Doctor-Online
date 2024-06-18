<?php

namespace App\Repository\Appointment;

use App\Interfaces\Appointment\AppointmentRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    // id: Doctor Id Or User Id
    public function index($id)
    {
        if (auth()->guard('web')->check()) {
            $appointments = Appointment::with(['doctor'])
                ->where('user_id', $id)
                ->orderBy('status')
                ->orderBy('appointment_date')
                ->orderBy('appointment_time')
                ->get();

            return view('Dashboard.User.Appointment.index', compact('appointments'));

        } elseif (auth()->guard('doctor')->check()) {
            $appointments = Appointment::with(['user'])
                ->where('doctor_id', $id)
                ->orderBy('status')
                ->orderBy('appointment_date')
                ->orderBy('appointment_time')
                ->get();

            return view('Dashboard.Doctor.Appointment.index', compact('appointments'));
        }
    }

    public function create($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor_id = $doctor->id;
        $doctor_name = $doctor->name;

        return view('Dashboard.User.Appointment.add', compact('doctor_id', 'doctor_name'));
    }

    public function store($request)
    {
        try {
            // استخراج معرف المستخدم من الطلب
            $user_id = $request->input('user_id');

            // التحقق مما إذا كان معرف المستخدم المُحدد مختلف عن معرف المستخدم الحالي
            if ($user_id == auth()->id()) {
                // إنشاء موعد جديد بالبيانات المرسلة في الطلب
                Appointment::create([
                    'doctor_id' => $request->input('doctor_id'),
                    'user_id' => $request->input('user_id'),
                    'appointment_date' => $request->input('appointment_date'),
                    'appointment_time' => $request->input('appointment_time'),
                ]);

                // عرض رسالة تأكيد للمستخدم
                session()->flash('add');

                // إعادة توجيه المستخدم إلى قائمة مواعيده
                return redirect()->route('User.Appointments.index', ['Appointment' => $user_id]);
            }
            // إعادة توجيه المستخدم إلى الصفحة السابقة مع رسالة خطأ في حالة معرف المستخدم المحدد يتطابق مع معرف المستخدم الحالي
            return redirect()->back()->withErrors(['error' => 'Error: You cannot create an appointment for another person.']);
        } catch (\Exception $exception) {
            // إعادة توجيه المستخدم إلى الصفحة السابقة مع رسالة خطأ في حالة حدوث استثناء ما
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $doctor_id = $request->input('doctor_id');

            $status = $request->input('status');
            $meeting_link = $request->input('meeting_link');

            $appointment = Appointment::where('doctor_id', $doctor_id)->findOrFail($request->input('id'));

            if ($status == 0) {
                $appointment->update([
                    'meeting_link' => null,
                    'status' => $request->input('status'),
                ]);
            } elseif ($status == 1) {
                $appointment->update([
                    'meeting_link' => $request->input('meeting_link'),
                    'status' => $request->input('status'),
                ]);
            } elseif ($status == 2) {
                $appointment->update([
                    'meeting_link' => null,
                    'status' => $request->input('status'),
                ]);
            } elseif ($status == 3) {
                $appointment->update([
                    'meeting_link' => null,
                    'status' => $request->input('status'),
                ]);
            }

            session()->flash('edit');
            return redirect()->route('Doctor.Appointments.index', ['Appointment' => $doctor_id]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function destroy($request)
    {
        try {
            // التحقق مما إذا كان المستخدم مصادقًا عليه من خلال الحارس 'web'
            if (auth()->guard('web')->check()) {
                // الحصول على معرف المستخدم من الطلب
                $user_id = $request->input('user_id');

                // التحقق مما إذا كان معرف المستخدم يتطابق مع معرف المستخدم المصادق عليه
                if ($user_id == auth()->id()) {
                    // حذف الموعد
                    $appointment = Appointment::where('user_id', $user_id)->findOrFail($request->input('id'))->delete();
                    // تخزين رسالة الجلسة المؤقتة
                    session()->flash('delete');
                    // إعادة توجيه المستخدم إلى صفحة فهرس المواعيد
                    return redirect()->route('User.Appointments.index', ['Appointment' => $user_id]);
                }
                // إعادة التوجيه مع رسالة خطأ إذا حاول المستخدم حذف موعد لشخص آخر
                return redirect()->back()->withErrors(['error' => 'Error: You cannot delete an appointment for another person.']);
            } elseif (auth()->guard('doctor')->check()) {
                // الحصول على معرف المستخدم من الطلب
                $doctor_id = $request->input('doctor_id');

                // التحقق مما إذا كان معرف المستخدم يتطابق مع معرف المستخدم المصادق عليه
                if ($doctor_id == auth()->id()) {
                    // حذف الموعد
                    $appointment = Appointment::where('doctor_id', $doctor_id)->findOrFail($request->input('id'))->delete();
                    // تخزين رسالة الجلسة المؤقتة
                    session()->flash('delete');
                    // إعادة توجيه المستخدم إلى صفحة فهرس المواعيد
                    return redirect()->route('Doctor.Appointments.index', ['Appointment' => $doctor_id]);
                }
                // إعادة التوجيه مع رسالة خطأ إذا حاول المستخدم حذف موعد لشخص آخر
                return redirect()->back()->withErrors(['error' => 'Error: You cannot delete an appointment for another person.']);
            }

        } catch (\Exception $exception) {
            // إعادة التوجيه مع رسالة خطأ إذا حدث استثناء
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}