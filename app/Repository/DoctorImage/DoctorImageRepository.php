<?php

namespace App\Repository\DoctorImage;

use App\Interfaces\DoctorImage\DoctorImageRepositoryInterface;
use App\Models\Doctor;
use App\Models\NutritionalFact;
use App\Models\DoctorImage;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;

class DoctorImageRepository implements DoctorImageRepositoryInterface
{
    use UploadTrait;

    public function create($id)
    {
        $doctor_id = Doctor::where('id', $id)->pluck('id')->first();
        return view('Dashboard.Admin.Doctor.Doctor-Image.add', compact('doctor_id'));
    }

    public function store($request)
    {
        try {
            $doctor_id = $request->input('doctor_id');

            $doctorImageData = $request->all();

            if ($request->hasFile('image')) {
                $imagePath = $this->uploadImage($request, 'Doctor-Certificate');
                $doctorImageData['image'] = $imagePath;
            }

            DoctorImage::create($doctorImageData);

            session()->flash('add');
            return redirect()->route('Admin.Doctors.show', ['Doctor' => $doctor_id]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function destroy($request)
    {
        try {
            $doctor_id = $request->input('doctor_id');

            $doctorImageId = $request->input('id');
            $doctorImage = DoctorImage::findOrFail($doctorImageId);

            $this->deleteFile($doctorImage->image, 'images');

            $doctorImage->delete();

            session()->flash('delete');
            return redirect()->route('Admin.Doctors.show', ['Doctor' => $doctor_id]);

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }
}