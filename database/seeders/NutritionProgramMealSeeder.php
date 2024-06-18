<?php

namespace Database\Seeders;

use App\Models\NutritionProgramMeal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NutritionProgramMealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nutritionProgramMeals = [
            [
                'nutrition_program_id' => '1',
                'meal_name' => 'Meal Name 1',
                'description' => 'Description 1',
                'additional_notes' => 'Additional Notes 1',
                'quantity' => 'Quantity 1',
                'calories' => 10,
                'proteins' => 120,
                'fats' => 50,
                'carbohydrates' => 55,
                'meal_type' => 'Meal Type 1',
                'meal_time' => '08:00',
            ],
            [
                'nutrition_program_id' => '1',
                'meal_name' => 'Meal Name 2',
                'description' => 'Description 2',
                'additional_notes' => 'Additional Notes 2',
                'quantity' => 'Quantity 3',
                'calories' => 20,
                'proteins' => 140,
                'fats' => 54,
                'carbohydrates' => 65,
                'meal_type' => 'Meal Type 2',
                'meal_time' => '16:00',
            ],
            [
                'nutrition_program_id' => '1',
                'meal_name' => 'Meal Name 3',
                'description' => 'Description 3',
                'additional_notes' => 'Additional Notes 3',
                'quantity' => 'Quantity 3',
                'calories' => 33,
                'proteins' => 42,
                'fats' => 22,
                'carbohydrates' => 41,
                'meal_type' => 'Meal Type 3',
                'meal_time' => '18:00',
            ],
        ];

        foreach ($nutritionProgramMeals as $nutritionProgramMeal) {
            NutritionProgramMeal::create($nutritionProgramMeal);
        }

    }
}
