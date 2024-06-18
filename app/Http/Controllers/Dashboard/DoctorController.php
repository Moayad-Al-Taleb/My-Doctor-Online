<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctor\DoctorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    private $doctorRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        return $this->doctorRepository->index();
    }

    public function create()
    {
        return $this->doctorRepository->create();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:doctor_translations,name',
            'email' => 'required|string|email|max:255|unique:doctors,email',
            'password' => 'required|string|min:8',
            'birth_date' => 'required|date',
            'telegram_number' => [
                'nullable',
                'string',
                'regex:/^09\d{8}$/',
            ],
            'telegram_id' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_card_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'address' => 'nullable|string|max:255',
        ]);

        return $this->doctorRepository->store($request);

    }

    public function show($id)
    {
        return $this->doctorRepository->show($id);
    }

    public function edit($id)
    {
        return $this->doctorRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('doctor_translations')->ignore($request->input('id')),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('doctors')->ignore($request->input('id')),
            ],
            'birth_date' => 'required|date',
            'telegram_number' => [
                'nullable',
                'string',
                'regex:/^09\d{8}$/',
            ],
            'telegram_id' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_card_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'address' => 'nullable|string|max:255',
        ]);

        return $this->doctorRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->doctorRepository->destroy($request);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        return $this->doctorRepository->update_password($request);
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1|numeric'
        ]);

        return $this->doctorRepository->update_status($request);
    }
}
