<?php

namespace App\Repository\NutritionProgramMeal;

use App\Interfaces\NutritionProgramMeal\NutritionProgramMealRepositoryInterface;
use App\Models\NutritionProgram;
use App\Models\NutritionProgramMeal;
use Illuminate\Support\Facades\Auth;


class NutritionProgramMealRepository implements NutritionProgramMealRepositoryInterface
{
    public function create($id)
    {
        $doctor_id = Auth::id();

        $nutrition_program = NutritionProgram::where('doctor_id', $doctor_id)->findOrFail($id);
        $nutrition_program_id = $nutrition_program->id;

        return view('Dashboard.Doctor.Nutrition-Program.Nutrition-Program-Meal.add', compact('nutrition_program_id'));
    }

    public function store($request)
    {
        try {
            $nutrition_program_id = $request->input('nutrition_program_id');

            NutritionProgramMeal::create($request->all());

            session()->flash('add');
            return redirect()->route('Doctor.NutritionPrograms.show', ['NutritionProgram' => $nutrition_program_id]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function show($nutrition_program_id, $id)
    {
        if (auth()->guard('doctor')->check()) {
            $nutritionProgramMeal = NutritionProgramMeal::findOrFail($id);

            return view('Dashboard.Doctor.Nutrition-Program.Nutrition-Program-Meal.show', compact('nutritionProgramMeal', 'nutrition_program_id'));
        } elseif (auth()->guard('web')->check()) {
            $nutritionProgramMeal = NutritionProgramMeal::findOrFail($id);

            return view('Dashboard.User.Nutrition-Program.Nutrition-Program-Meal.show', compact('nutritionProgramMeal', 'nutrition_program_id'));

        }
    }

    public function destroy($request)
    {
        try {
            $nutrition_program_id = $request->input('nutrition_program_id');
            $nutrition_program_meal_id = $request->input('nutrition_program_meal_id');

            $nutritionProgramMeal = NutritionProgramMeal::findOrFail($nutrition_program_meal_id)->delete();

            session()->flash('delete');
            return redirect()->route('Doctor.NutritionPrograms.show', ['NutritionProgram' => $nutrition_program_id]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

}