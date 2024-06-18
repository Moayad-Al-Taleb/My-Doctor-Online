<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointments = [
            [
                'doctor_id' => 1,
                'user_id' => 1,
                'appointment_date' => '2024-06-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 2,
                'user_id' => 2,
                'appointment_date' => '2024-07-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 3,
                'user_id' => 3,
                'appointment_date' => '2024-08-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 4,
                'user_id' => 4,
                'appointment_date' => '2024-09-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 5,
                'user_id' => 5,
                'appointment_date' => '2024-010-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 6,
                'user_id' => 6,
                'appointment_date' => '2024-11-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 7,
                'user_id' => 7,
                'appointment_date' => '2024-12-10',
                'appointment_time' => '08:00',
            ],
            [
                'doctor_id' => 8,
                'user_id' => 8,
                'appointment_date' => '2025-01-10',
                'appointment_time' => '08:00',
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }

    }
}
