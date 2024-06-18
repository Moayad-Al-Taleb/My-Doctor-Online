<?php

namespace Database\Seeders;

use App\Models\Illness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IllnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $illnesses = [
            [
                'name' => 'Diabetes',
                'description' => 'A chronic disease characterized by high blood sugar levels due to a lack of insulin or its ineffectiveness. Patients need careful dietary monitoring to avoid high or low blood sugar levels.'
            ],
            [
                'name' => 'Obesity',
                'description' => 'A chronic medical condition characterized by excessive weight gain beyond healthy limits. Obesity is associated with high risks of heart disease, high blood pressure, and type 2 diabetes. Treatment requires dietary adjustments and exercise.'
            ],
            [
                'name' => 'Hypertension',
                'description' => 'A medical condition characterized by consistently high blood pressure in the arteries. Proper nutrition can help control blood pressure levels by reducing sodium intake and increasing intake of foods rich in potassium and magnesium.'
            ],
            [
                'name' => 'Coronary Heart Disease',
                'description' => 'A disease affecting the coronary arteries responsible for supplying blood to the heart. Healthy nutrition plays an important role in preventing cholesterol buildup in the arteries and reducing the risk of heart attacks.'
            ],
            [
                'name' => 'Irritable Bowel Syndrome',
                'description' => 'A common disorder affecting the large intestine. Common symptoms include abdominal cramps, bloating, and constipation or diarrhea. Appropriate nutrition can help manage symptoms and improve quality of life.'
            ],
        ];

        foreach ($illnesses as $illness) {
            Illness::create($illness);
        }
    }
}
