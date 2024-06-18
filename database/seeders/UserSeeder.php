<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1990-01-01',
                'telegram_number' => '123456789', // nullable
                'telegram_id' => 'john_doe', // nullable
                'height' => 180, // nullable
                'weight' => 75, // nullable
                'gender' => 0, //$table->tinyInteger('gender');
                'address' => '123 Main St', // nullable
                'blood_type' => 'A+', // nullable
                'medical_conditions' => 'None', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Engineer', // nullable
                'physical_activity_level' => 'Moderate', // nullable
                'goal' => 'Fitness', // nullable
                'food_preferences' => 'Vegetarian', // nullable
                'chronic_diseases' => 'None', // nullable
                'current_medications' => 'None', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Occasionally', // nullable
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1985-05-15',
                'telegram_number' => '987654321', // nullable
                'telegram_id' => 'jane_smith', // nullable
                'height' => 165, // nullable
                'weight' => 60, // nullable
                'gender' => 1, //$table->tinyInteger('gender');
                'address' => '456 Elm St', // nullable
                'blood_type' => 'B-', // nullable
                'medical_conditions' => 'Asthma', // nullable
                'allergies' => 'Peanuts', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Teacher', // nullable
                'physical_activity_level' => 'Low', // nullable
                'goal' => 'Weight Loss', // nullable
                'food_preferences' => 'Non-Vegetarian', // nullable
                'chronic_diseases' => 'Asthma', // nullable
                'current_medications' => 'Inhaler', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Never', // nullable
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1992-07-10',
                'telegram_number' => '123123123', // nullable
                'telegram_id' => 'alice_johnson', // nullable
                'height' => 170, // nullable
                'weight' => 65, // nullable
                'gender' => 1, //$table->tinyInteger('gender');
                'address' => '789 Maple St', // nullable
                'blood_type' => 'O+', // nullable
                'medical_conditions' => 'Diabetes', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'Vegan', // nullable
                'occupation' => 'Designer', // nullable
                'physical_activity_level' => 'High', // nullable
                'goal' => 'Muscle Gain', // nullable
                'food_preferences' => 'Vegan', // nullable
                'chronic_diseases' => 'Diabetes', // nullable
                'current_medications' => 'Insulin', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Occasionally', // nullable
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1980-12-20',
                'telegram_number' => '456456456', // nullable
                'telegram_id' => 'bob_brown', // nullable
                'height' => 175, // nullable
                'weight' => 80, // nullable
                'gender' => 0, //$table->tinyInteger('gender');
                'address' => '101 Pine St', // nullable
                'blood_type' => 'AB+', // nullable
                'medical_conditions' => 'Hypertension', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Manager', // nullable
                'physical_activity_level' => 'Low', // nullable
                'goal' => 'Weight Maintenance', // nullable
                'food_preferences' => 'Non-Vegetarian', // nullable
                'chronic_diseases' => 'Hypertension', // nullable
                'current_medications' => 'Beta Blockers', // nullable
                'smoking_status' => 'Former smoker', // nullable
                'alcohol_consumption' => 'Socially', // nullable
            ],
            [
                'name' => 'Charlie Green',
                'email' => 'charlie@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1995-03-25',
                'telegram_number' => '789789789', // nullable
                'telegram_id' => 'charlie_green', // nullable
                'height' => 160, // nullable
                'weight' => 50, // nullable
                'gender' => 0, //$table->tinyInteger('gender');
                'address' => '202 Oak St', // nullable
                'blood_type' => 'A-', // nullable
                'medical_conditions' => 'None', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'Gluten-Free', // nullable
                'occupation' => 'Developer', // nullable
                'physical_activity_level' => 'Moderate', // nullable
                'goal' => 'Health Improvement', // nullable
                'food_preferences' => 'Vegetarian', // nullable
                'chronic_diseases' => 'None', // nullable
                'current_medications' => 'None', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Never', // nullable
            ],
            [
                'name' => 'David White',
                'email' => 'david@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1988-11-30',
                'telegram_number' => '111111111', // nullable
                'telegram_id' => 'david_white', // nullable
                'height' => 185, // nullable
                'weight' => 85, // nullable
                'gender' => 0, //$table->tinyInteger('gender');
                'address' => '303 Birch St', // nullable
                'blood_type' => 'B+', // nullable
                'medical_conditions' => 'None', // nullable
                'allergies' => 'Shellfish', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Doctor', // nullable
                'physical_activity_level' => 'High', // nullable
                'goal' => 'Fitness', // nullable
                'food_preferences' => 'Non-Vegetarian', // nullable
                'chronic_diseases' => 'None', // nullable
                'current_medications' => 'None', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Occasionally', // nullable
            ],
            [
                'name' => 'Emma Black',
                'email' => 'emma@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1993-09-15',
                'telegram_number' => '222222222', // nullable
                'telegram_id' => 'emma_black', // nullable
                'height' => 172, // nullable
                'weight' => 68, // nullable
                'gender' => 1, //$table->tinyInteger('gender');
                'address' => '404 Cedar St', // nullable
                'blood_type' => 'O-', // nullable
                'medical_conditions' => 'None', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'Pescatarian', // nullable
                'occupation' => 'Nurse', // nullable
                'physical_activity_level' => 'Moderate', // nullable
                'goal' => 'Health Improvement', // nullable
                'food_preferences' => 'Pescatarian', // nullable
                'chronic_diseases' => 'None', // nullable
                'current_medications' => 'None', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Never', // nullable
            ],
            [
                'name' => 'Frank Blue',
                'email' => 'frank@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1975-02-20',
                'telegram_number' => '333333333', // nullable
                'telegram_id' => 'frank_blue', // nullable
                'height' => 178, // nullable
                'weight' => 82, // nullable
                'gender' => 0, //$table->tinyInteger('gender');
                'address' => '505 Willow St', // nullable
                'blood_type' => 'AB-', // nullable
                'medical_conditions' => 'Arthritis', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Lawyer', // nullable
                'physical_activity_level' => 'Low', // nullable
                'goal' => 'Weight Maintenance', // nullable
                'food_preferences' => 'Non-Vegetarian', // nullable
                'chronic_diseases' => 'Arthritis', // nullable
                'current_medications' => 'Pain Relievers', // nullable
                'smoking_status' => 'Former smoker', // nullable
                'alcohol_consumption' => 'Socially', // nullable
            ],
            [
                'name' => 'Grace Grey',
                'email' => 'grace@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1998-04-05',
                'telegram_number' => '444444444', // nullable
                'telegram_id' => 'grace_grey', // nullable
                'height' => 168, // nullable
                'weight' => 58, // nullable
                'gender' => 1, //$table->tinyInteger('gender');
                'address' => '606 Fir St', // nullable
                'blood_type' => 'A+', // nullable
                'medical_conditions' => 'None', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Artist', // nullable
                'physical_activity_level' => 'High', // nullable
                'goal' => 'Muscle Gain', // nullable
                'food_preferences' => 'Vegetarian', // nullable
                'chronic_diseases' => 'None', // nullable
                'current_medications' => 'None', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Occasionally', // nullable
            ],
            [
                'name' => 'Henry Yellow',
                'email' => 'henry@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1983-06-18',
                'telegram_number' => '555555555', // nullable
                'telegram_id' => 'henry_yellow', // nullable
                'height' => 182, // nullable
                'weight' => 78, // nullable
                'gender' => 0, //$table->tinyInteger('gender');
                'address' => '707 Ash St', // nullable
                'blood_type' => 'B-', // nullable
                'medical_conditions' => 'None', // nullable
                'allergies' => 'None', // nullable
                'dietary_restrictions' => 'None', // nullable
                'occupation' => 'Pilot', // nullable
                'physical_activity_level' => 'Moderate', // nullable
                'goal' => 'Health Improvement', // nullable
                'food_preferences' => 'Non-Vegetarian', // nullable
                'chronic_diseases' => 'None', // nullable
                'current_medications' => 'None', // nullable
                'smoking_status' => 'Non-smoker', // nullable
                'alcohol_consumption' => 'Never', // nullable
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
