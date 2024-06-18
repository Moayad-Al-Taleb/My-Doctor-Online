<?php

namespace App\Repository\Doctor;

use App\Interfaces\Doctor\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        if (auth()->guard('admin')->check()) {
            $doctors = Doctor::all();
            return view('Dashboard.Admin.Doctor.index', compact('doctors'));
        } elseif (auth()->guard('web')->check()) {
            $doctors = Doctor::all();
            return view('Dashboard.User.Doctor.index', compact('doctors'));
        }

    }

    public function create()
    {
        return view('Dashboard.Admin.Doctor.add');
    }

    public function store($request)
    {
        try {
            $doctorData = $request->all();

            if ($request->hasFile('profile_picture')) {
                $profile_picture = $request->file('profile_picture');

                $originalName = $profile_picture->getClientOriginalName();
                $extension = $profile_picture->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $request->name . '_' . date('Y.m.d_His') . '.' . $extension;

                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {

                    $path = $profile_picture->storeAs('Doctor', $newName, 'images');
                    $doctorData['profile_picture'] = $path;

                }
            }

            if ($request->hasFile('id_card_picture')) {
                $id_card_picture = $request->file('id_card_picture');

                $originalName = $id_card_picture->getClientOriginalName();
                $extension = $id_card_picture->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $request->name . '_' . date('Y.m.d_His') . '.' . $extension;

                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {

                    $path = $id_card_picture->storeAs('Doctor', $newName, 'images');
                    $doctorData['id_card_picture'] = $path;

                }
            }

            Doctor::create($doctorData);
            session()->flash('add');
            return redirect()->route('Admin.Doctors.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function show($id)
    {
        if (auth()->guard('admin')->check()) {
            $doctor = Doctor::with(['doctorImages'])->findOrFail($id);

            $doctorImages = $doctor->doctorImages;

            return view('Dashboard.Admin.Doctor.show', compact('doctor', 'doctorImages'));
        } elseif (auth()->guard('web')->check()) {
            $doctor = Doctor::where('id', $id)->with(['doctorImages'])->findOrFail($id);

            $doctorImages = $doctor->doctorImages;

            return view('Dashboard.User.Doctor.show', compact('doctor', 'doctorImages'));
        }

    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('Dashboard.Admin.Doctor.edit', compact('doctor'));
    }

    public function update($request)
    {
        try {
            // البحث عن الطبيب باستخدام المعرف الذي تم تمريره في الطلب
            $doctor = Doctor::findOrFail($request->input('id'));
            $doctorData = $request->toArray();

            // التحقق مما إذا كانت صورة الملف الشخصي مرفوعة في الطلب
            if ($request->hasFile('profile_picture')) {

                // حذف الصورة القديمة إذا كانت موجودة
                if ($doctor->profile_picture) {
                    $this->deleteFile($doctor->profile_picture, 'images');
                }

                // الحصول على الملف المرفوع وتحديد خصائصه
                $profile_picture = $request->file('profile_picture');
                $originalName = $profile_picture->getClientOriginalName();
                $extension = $profile_picture->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $request->name . '_' . date('Y.m.d_His') . '.' . $extension;

                // التحقق من أن الملف هو صورة بصيغة مقبولة
                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    // تخزين الصورة الجديدة وتحديث بيانات الطبيب
                    $path = $profile_picture->storeAs('Doctor', $newName, 'images');
                    $doctorData['profile_picture'] = $path;
                }
            }

            // التحقق مما إذا كانت صورة البطاقة الشخصية مرفوعة في الطلب
            if ($request->hasFile('id_card_picture')) {

                // حذف الصورة القديمة إذا كانت موجودة
                if ($doctor->id_card_picture) {
                    $this->deleteFile($doctor->id_card_picture, 'images');
                }

                // الحصول على الملف المرفوع وتحديد خصائصه
                $id_card_picture = $request->file('id_card_picture');
                $originalName = $id_card_picture->getClientOriginalName();
                $extension = $id_card_picture->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $request->name . '_' . date('Y.m.d_His') . '.' . $extension;

                // التحقق من أن الملف هو صورة بصيغة مقبولة
                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    // تخزين الصورة الجديدة وتحديث بيانات الطبيب
                    $path = $id_card_picture->storeAs('Doctor', $newName, 'images');
                    $doctorData['id_card_picture'] = $path;
                }
            }

            // تحديث بيانات الطبيب في قاعدة البيانات
            $doctor->update($doctorData);

            // عرض رسالة نجاح وإعادة التوجيه إلى الصفحة الرئيسية
            session()->flash('edit');
            return redirect()->route('Admin.Doctors.index');
        } catch (\Exception $exception) {
            // في حالة حدوث خطأ، العودة إلى الصفحة السابقة وعرض رسالة خطأ
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            if ($request->page_id == 1) {
                $doctor = Doctor::with(['doctorImages'])->findOrFail($request->input('id'));
                $doctorImages = $doctor->doctorImages;

                if ($doctor->profile_picture) {
                    $this->deleteFile($doctor->profile_picture, 'images');
                }
                if ($doctor->id_card_picture) {
                    $this->deleteFile($doctor->id_card_picture, 'images');
                }

                foreach ($doctorImages as $doctorImage) {
                    $this->deleteFile($doctorImage->file, 'images');
                }

                $doctor->delete();
            } else {
                $delete_select_id = explode(",", $request->delete_select_id);
                foreach ($delete_select_id as $doctor_id) {
                    $doctor = Doctor::with(['doctorImages'])->findOrFail($doctor_id);
                    $doctorImages = $doctor->doctorImages;

                    if ($doctor->profile_picture) {
                        $this->deleteFile($doctor->profile_picture, 'images');
                    }
                    if ($doctor->id_card_picture) {
                        $this->deleteFile($doctor->id_card_picture, 'images');
                    }

                    foreach ($doctorImages as $doctorImage) {
                        $this->deleteFile($doctorImage->file, 'images');
                    }

                }
                Doctor::destroy($delete_select_id);
            }
            session()->flash('delete');
            return redirect()->route('Admin.Doctors.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function update_password($request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);

            $doctor->update([
                'password' => Hash::make($request->password)
            ]);

            session()->flash('edit');
            return redirect()->route('Admin.Doctors.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update_status($request)
    {
        try {
            $doctor = Doctor::findOrFail($request->input('id'));
            $doctor->update([
                'status' => $request->input('status'),
            ]);
            session()->flash('edit');
            return redirect()->route('Admin.Doctors.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}