<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\NutritionProgramMeal\NutritionProgramMealRepositoryInterface;
use Illuminate\Http\Request;

class NutritionProgramMealController extends Controller
{
    private $nutritionProgramMealRepository;

    public function __construct(NutritionProgramMealRepositoryInterface $nutritionProgramMealRepository)
    {
        $this->nutritionProgramMealRepository = $nutritionProgramMealRepository;
    }


    public function create($id)
    {
        return $this->nutritionProgramMealRepository->create($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'meal_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'additional_notes' => 'nullable|string',
            'nutrition_program_id' => 'required|exists:nutrition_programs,id',
            'quantity' => 'required|string|max:255',
            'calories' => 'nullable|integer',
            'proteins' => 'nullable|integer',
            'fats' => 'nullable|integer',
            'carbohydrates' => 'nullable|integer',
            'meal_type' => 'nullable|string|max:255',
            'meal_time' => 'nullable|date_format:H:i',
        ]);

        return $this->nutritionProgramMealRepository->store($request);
    }

    public function show($nutrition_program_id, $id)
    {
        return $this->nutritionProgramMealRepository->show($nutrition_program_id, $id);
    }

    public function destroy(Request $request)
    {
        return $this->nutritionProgramMealRepository->destroy($request);
    }

}
