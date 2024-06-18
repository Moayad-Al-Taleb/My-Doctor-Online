<?php

namespace Database\Seeders;

use App\Models\HealthCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $healthCategories = [
            [
                'name' => 'Obesity',
                'description' => 'A condition characterized by excessive body fat, which increases the risk of health problems.'
            ],
            [
                'name' => 'Underweight',
                'description' => 'A condition where a person weighs less than what is considered healthy for their height, potentially leading to various health issues.'
            ],
            [
                'name' => 'Hypertension',
                'description' => 'A condition where the force of the blood against the artery walls is too high, often leading to health complications like heart disease.'
            ],
            [
                'name' => 'Diabetes',
                'description' => 'A group of diseases that result in too much sugar in the blood (high blood glucose).'
            ],
            [
                'name' => 'Cardiovascular Disease',
                'description' => 'A class of diseases that involve the heart or blood vessels, including coronary artery disease, heart attack, and stroke.'
            ],
            [
                'name' => 'Anemia',
                'description' => 'A condition where you lack enough healthy red blood cells to carry adequate oxygen to your body\'s tissues.'
            ],
        ];

        foreach ($healthCategories as $healthCategory) {
            HealthCategory::create($healthCategory);
        }
    }
}
