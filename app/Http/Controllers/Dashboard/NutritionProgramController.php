<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\NutritionProgram\NutritionProgramRepositoryInterface;
use Illuminate\Http\Request;

class NutritionProgramController extends Controller
{
    private $nutritionProgramRepository;

    public function __construct(NutritionProgramRepositoryInterface $nutritionProgramRepository)
    {
        $this->nutritionProgramRepository = $nutritionProgramRepository;
    }

    public function index()
    {
        return $this->nutritionProgramRepository->index();
    }

    public function create()
    {
        return $this->nutritionProgramRepository->create();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'health_category_id' => 'nullable|integer|exists:health_categories,id',
            'illness_id' => 'nullable|integer|exists:illnesses,id',
            'user_id' => 'required|integer',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:today',
        ]);

        return $this->nutritionProgramRepository->store($request);
    }

    public function show($id)
    {
        return $this->nutritionProgramRepository->show($id);
    }

    public function edit($id)
    {
        return $this->nutritionProgramRepository->edit($id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'health_category_id' => 'nullable|integer|exists:health_categories,id',
            'illness_id' => 'nullable|integer|exists:illnesses,id',
            'user_id' => 'required|integer',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:today',
        ]);

        return $this->nutritionProgramRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->nutritionProgramRepository->destroy($request);
    }

}
