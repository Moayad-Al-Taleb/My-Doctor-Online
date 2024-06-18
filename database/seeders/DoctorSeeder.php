<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            [
                'name' => 'Dr. Ahmed Al-Ali',
                'email' => 'ahmed.ali@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1980-01-01',
                'telegram_number' => '0912345678',
                'description' => 'Graduated from Cairo University with a GPA of 3.5',
                'address' => '123 Tahrir Street, Cairo, Egypt',
            ],
            [
                'name' => 'Dr. Fatima Hassan',
                'email' => 'fatima.hassan@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1985-02-14',
                'telegram_number' => '0923456789',
                'description' => 'Graduated from King Saud University with a GPA of 3.7',
                'address' => '456 Olaya Street, Riyadh, Saudi Arabia',
            ],
            [
                'name' => 'Dr. Omar El-Sayed',
                'email' => 'omar.elsayed@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1978-03-22',
                'telegram_number' => '0934567890',
                'description' => 'Graduated from University of Baghdad with a GPA of 3.6',
                'address' => '789 Al-Rashid Street, Baghdad, Iraq',
            ],
            [
                'name' => 'Dr. Layla Youssef',
                'email' => 'layla.youssef@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1990-04-05',
                'telegram_number' => '0945678901',
                'description' => 'Graduated from Beirut Arab University with a GPA of 3.8',
                'address' => '321 Hamra Street, Beirut, Lebanon',
            ],
            [
                'name' => 'Dr. Khaled Anwar',
                'email' => 'khaled.anwar@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1982-05-18',
                'telegram_number' => '0956789012',
                'description' => 'Graduated from Qatar University with a GPA of 3.4',
                'address' => '654 Corniche Street, Doha, Qatar',
            ],
            [
                'name' => 'Dr. Noura Al-Zahrani',
                'email' => 'noura.zahrani@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1987-06-12',
                'telegram_number' => '0967890123',
                'description' => 'Graduated from United Arab Emirates University with a GPA of 3.9',
                'address' => '987 Sheikh Zayed Road, Dubai, UAE',
            ],
            [
                'name' => 'Dr. Youssef Al-Masri',
                'email' => 'youssef.masri@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1983-07-20',
                'telegram_number' => '0978901234',
                'description' => 'Graduated from American University of Beirut with a GPA of 3.6',
                'address' => '123 Bliss Street, Beirut, Lebanon',
            ],
            [
                'name' => 'Dr. Salma Al-Tamimi',
                'email' => 'salma.tamimi@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1991-08-15',
                'telegram_number' => '0989012345',
                'description' => 'Graduated from Sultan Qaboos University with a GPA of 3.7',
                'address' => '456 Al-Khuwair Street, Muscat, Oman',
            ],
            [
                'name' => 'Dr. Hani Al-Khaled',
                'email' => 'hani.khaled@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1986-09-10',
                'telegram_number' => '0990123456',
                'description' => 'Graduated from Jordan University of Science and Technology with a GPA of 3.8',
                'address' => '789 University Street, Irbid, Jordan',
            ],
            [
                'name' => 'Dr. Reem Al-Mutairi',
                'email' => 'reem.mutairi@doctorOnline.com',
                'password' => Hash::make('password'),
                'birth_date' => '1989-10-25',
                'telegram_number' => '0901234567',
                'description' => 'Graduated from Kuwait University with a GPA of 3.9',
                'address' => '321 Gulf Road, Kuwait City, Kuwait',
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
