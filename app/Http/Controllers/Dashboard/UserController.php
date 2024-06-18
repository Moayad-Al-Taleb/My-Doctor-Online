<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->index();
    }

    public function show($id)
    {
        return $this->userRepository->show($id);
    }

    public function edit($id)
    {
        return $this->userRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('user_translations')->ignore($request->input('id')),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->input('id')),
            ],
            'birth_date' => 'required|date',
            'telegram_number' => 'nullable|string|max:255',
            'telegram_id' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_card_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'gender' => 'required|in:0,1',
            'address' => 'nullable|string|max:255',
            'blood_type' => 'nullable|string|max:255',
            'medical_conditions' => 'nullable|string',
            'dietary_restrictions' => 'nullable|string',
            'occupation' => 'nullable|string|max:255',
            'physical_activity_level' => 'nullable|string|max:255',
            'goal' => 'nullable|string|max:255',
            'food_preferences' => 'nullable|string',
            'chronic_diseases' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'smoking_status' => 'nullable|string|max:255',
            'alcohol_consumption' => 'nullable|string|max:255',
        ]);

        return $this->userRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->userRepository->destroy($request);
    }

    public function edit_password($id)
    {
        return $this->userRepository->edit_password($id);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        return $this->userRepository->update_password($request);
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1|numeric'
        ]);

        return $this->userRepository->update_status($request);
    }

}
