<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            DoctorSeeder::class,
            HealthCategorySeeder::class,
            IllnessSeeder::class,
            ArticleSeeder::class,
            NutritionalFactSeeder::class,
            UserSeeder::class,
            AppointmentSeeder::class,
            NutritionProgramSeeder::class,
            NutritionProgramMealSeeder::class,
        ]);

    }
}
