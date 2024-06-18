<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\HealthCategory\HealthCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HealthCategoryController extends Controller
{
    private $healthCategoryRepository;

    public function __construct(HealthCategoryRepositoryInterface $healthCategoryRepository)
    {
        $this->healthCategoryRepository = $healthCategoryRepository;
    }

    public function index()
    {
        return $this->healthCategoryRepository->index();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:health_category_translations|max:255',
            'description' => 'required|max:65535',
        ]);

        return $this->healthCategoryRepository->store($request);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('health_category_translations')->ignore($request->input('id')),
                'max:255',
            ],
            'description' => 'required|max:65535',
        ]);

        return $this->healthCategoryRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->healthCategoryRepository->destroy($request);
    }
}
