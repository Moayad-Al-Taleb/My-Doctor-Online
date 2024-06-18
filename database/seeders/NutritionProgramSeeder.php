<?php

namespace Database\Seeders;

use App\Models\NutritionProgram;
use Illuminate\Database\Seeder;

class NutritionProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nutritionPrograms = [
            [
                'name' => 'Weight Gain Program',
                'description' => 'This program is designed for individuals looking to gain weight.',
                'health_category_id' => 1,
                'illness_id' => 1,
                'doctor_id' => 1,
                'user_id' => 1,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Weight Loss Program',
                'description' => 'This program is designed for individuals looking to lose weight.',
                'health_category_id' => 2,
                'illness_id' => 2,
                'doctor_id' => 1,
                'user_id' => 2,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Muscle Building Program',
                'description' => 'This program is designed for individuals looking to build muscle mass.',
                'health_category_id' => 3,
                'illness_id' => 3,
                'doctor_id' => 1,
                'user_id' => 3,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Diabetes Management Program',
                'description' => 'This program is designed for individuals managing diabetes.',
                'health_category_id' => 4,
                'illness_id' => 4,
                'doctor_id' => 1,
                'user_id' => 4,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Heart Health Program',
                'description' => 'This program is designed to promote heart health.',
                'health_category_id' => 5,
                'illness_id' => 5,
                'doctor_id' => 1,
                'user_id' => 5,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Prenatal Nutrition Program',
                'description' => 'This program provides nutrition guidance for expectant mothers.',
                'health_category_id' => 1,
                'illness_id' => 2,
                'doctor_id' => 1,
                'user_id' => 6,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Postpartum Recovery Program',
                'description' => 'This program assists new mothers in recovering postpartum.',
                'health_category_id' => 2,
                'illness_id' => 3,
                'doctor_id' => 1,
                'user_id' => 7,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Vegan Nutrition Program',
                'description' => 'This program provides nutrition guidance for individuals following a vegan diet.',
                'health_category_id' => 2,
                'illness_id' => 1,
                'doctor_id' => 1,
                'user_id' => 8,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Ketogenic Diet Program',
                'description' => 'This program guides individuals through a ketogenic diet plan.',
                'health_category_id' => 3,
                'illness_id' => 4,
                'doctor_id' => 1,
                'user_id' => 9,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
            [
                'name' => 'Sports Nutrition Program',
                'description' => 'This program provides nutrition advice for athletes and active individuals.',
                'health_category_id' => 3,
                'illness_id' => 1,
                'doctor_id' => 1,
                'user_id' => 10,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ],
        ];

        foreach ($nutritionPrograms as $nutritionProgram) {
            NutritionProgram::create($nutritionProgram);
        }
    }
}
