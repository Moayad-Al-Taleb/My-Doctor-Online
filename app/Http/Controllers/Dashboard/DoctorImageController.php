<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\DoctorImage\DoctorImageRepositoryInterface;
use Illuminate\Http\Request;

class DoctorImageController extends Controller
{
    private $doctorImageRepository;

    public function __construct(DoctorImageRepositoryInterface $doctorImageRepository)
    {
        $this->doctorImageRepository = $doctorImageRepository;
    }


    public function create($id)
    {
        return $this->doctorImageRepository->create($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

        return $this->doctorImageRepository->store($request);
    }

    public function destroy(Request $request)
    {
        return $this->doctorImageRepository->destroy($request);
    }
}
