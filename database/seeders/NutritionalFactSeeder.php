<?php

namespace Database\Seeders;

use App\Models\NutritionalFact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NutritionalFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nutritionalFacts = [
            [
                'fact' => 'Fruits and vegetables are rich in essential vitamins and minerals.',
                'description' => 'Consuming a variety of fruits and vegetables can help prevent various chronic diseases and provide necessary nutrients for the body.',
                'health_category_id' => 1, // Assuming '1' refers to a relevant Health Category ID
                'illness_id' => 1, // Assuming '1' refers to a relevant Illness ID
                'doctor_id' => 1, // Assuming '1' refers to a relevant Doctor ID
            ],
            [
                'fact' => 'High fiber diets can aid in weight management.',
                'description' => 'Diets rich in fiber can help you feel full longer, thus reducing overall calorie intake and supporting weight management.',
                'health_category_id' => 1, // Obesity
                'illness_id' => 2, // Obesity
                'doctor_id' => 2, // Assuming '2' refers to another relevant Doctor ID
            ],
            [
                'fact' => 'Low sodium intake helps manage blood pressure.',
                'description' => 'Reducing sodium intake can help lower blood pressure and reduce the risk of hypertension-related health issues.',
                'health_category_id' => 3, // Hypertension
                'illness_id' => 3, // Hypertension
                'doctor_id' => 3, // Assuming '3' refers to another relevant Doctor ID
            ],
            [
                'fact' => 'Omega-3 fatty acids are beneficial for heart health.',
                'description' => 'Foods rich in Omega-3 fatty acids, such as fish, can help reduce inflammation and lower the risk of heart disease.',
                'health_category_id' => 5, // Cardiovascular Disease
                'illness_id' => 4, // Coronary Heart Disease
                'doctor_id' => 4, // Assuming '4' refers to another relevant Doctor ID
            ],
            [
                'fact' => 'Probiotics can improve gut health.',
                'description' => 'Probiotics found in foods like yogurt can help balance the gut microbiome and improve digestive health.',
                'health_category_id' => 1, // Assuming '1' refers to a relevant Health Category ID
                'illness_id' => 5, // Irritable Bowel Syndrome
                'doctor_id' => 5, // Assuming '5' refers to another relevant Doctor ID
            ],
        ];

        foreach ($nutritionalFacts as $nutritionalFact) {
            NutritionalFact::create($nutritionalFact);
        }
    }
}
