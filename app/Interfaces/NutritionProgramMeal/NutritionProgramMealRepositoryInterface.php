<?php

namespace App\Interfaces\NutritionProgramMeal;

interface NutritionProgramMealRepositoryInterface
{
    public function create($id);

    public function store($request);

    public function show($nutrition_program_id, $id);

    public function destroy($request);

}