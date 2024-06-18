<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'name' => 'The Importance of Healthy Eating in Managing Diabetes',
                'description' => 'An article discussing the critical role of healthy eating in managing blood sugar levels for diabetes patients.',
                'content' => 'Managing diabetes effectively requires a balanced diet rich in fiber and low in refined sugars. Patients should focus on whole grains, lean proteins, and a variety of vegetables to maintain stable blood sugar levels. The inclusion of foods with a low glycemic index can prevent spikes in blood sugar. Regular monitoring of blood glucose levels and adjusting dietary intake accordingly are crucial for diabetes management. Furthermore, portion control and regular meal timing can help in maintaining consistent energy levels throughout the day.',
                'health_category_id' => 4, // Diabetes
                'illness_id' => 1, // Diabetes
                'doctor_id' => 1,
            ],
            [
                'name' => 'Effective Strategies for Weight Loss in Obesity',
                'description' => 'An article providing evidence-based strategies for achieving and maintaining a healthy weight.',
                'content' => 'Weight loss in obesity can be achieved through a combination of dietary changes, regular physical activity, and behavioral modifications. Key strategies include reducing calorie intake, increasing physical activity, and adopting a sustainable eating plan. It is essential to focus on nutrient-dense foods that provide the necessary vitamins and minerals while keeping the calorie count low. Incorporating regular exercise, such as brisk walking, cycling, or swimming, can significantly enhance weight loss efforts. Behavioral strategies, such as setting realistic goals, tracking progress, and seeking support from healthcare professionals, can also improve the likelihood of long-term success.',
                'health_category_id' => 1, // Obesity
                'illness_id' => 2, // Obesity
                'doctor_id' => 2,
            ],
            [
                'name' => 'Lowering Blood Pressure Through Diet',
                'description' => 'An article exploring the impact of diet on managing hypertension.',
                'content' => 'Hypertension can be effectively managed by reducing sodium intake and increasing consumption of potassium-rich foods such as bananas, oranges, and leafy greens. A diet rich in fruits, vegetables, and low-fat dairy products can help lower blood pressure. The DASH (Dietary Approaches to Stop Hypertension) diet is specifically designed to combat high blood pressure by emphasizing the consumption of whole grains, nuts, seeds, and legumes. Reducing the intake of processed foods and limiting alcohol consumption can also contribute to better blood pressure control. Regular physical activity and maintaining a healthy weight are complementary strategies to enhance the effectiveness of dietary changes.',
                'health_category_id' => 3, // Hypertension
                'illness_id' => 3, // Hypertension
                'doctor_id' => 3,
            ],
            [
                'name' => 'Preventing Heart Disease with Healthy Nutrition',
                'description' => 'An article detailing how proper nutrition can prevent coronary heart disease.',
                'content' => 'Heart disease prevention is heavily influenced by diet. Reducing intake of saturated fats, trans fats, and cholesterol can lower the risk of heart attacks. Instead, focus on foods high in omega-3 fatty acids, fiber, and antioxidants. Consuming fatty fish like salmon and mackerel, nuts, seeds, and plant-based oils can improve heart health. Incorporating a variety of colorful fruits and vegetables into the diet provides essential vitamins and minerals that protect against heart disease. Whole grains, such as oats and brown rice, can help reduce cholesterol levels and improve cardiovascular health. Regular physical activity, maintaining a healthy weight, and avoiding smoking are additional lifestyle factors that support heart disease prevention.',
                'health_category_id' => 5, // Cardiovascular Disease
                'illness_id' => 4, // Coronary Heart Disease
                'doctor_id' => 4,
            ],
            [
                'name' => 'Managing Irritable Bowel Syndrome with Diet',
                'description' => 'An article about the role of diet in managing symptoms of irritable bowel syndrome.',
                'content' => 'For those with irritable bowel syndrome, diet plays a crucial role in symptom management. Common dietary approaches include a low-FODMAP diet, which reduces intake of certain carbohydrates that can cause bloating and gas. Identifying and avoiding trigger foods, such as dairy, gluten, and high-fat foods, can help alleviate symptoms. Including fiber-rich foods, such as whole grains, fruits, and vegetables, can improve bowel regularity. Staying hydrated and consuming probiotic-rich foods like yogurt can also support gut health. It is important for individuals with IBS to work with healthcare professionals to create a personalized dietary plan that addresses their specific symptoms and nutritional needs.',
                'health_category_id' => 6, // Anemia
                'illness_id' => 5, // Irritable Bowel Syndrome
                'doctor_id' => 5,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
