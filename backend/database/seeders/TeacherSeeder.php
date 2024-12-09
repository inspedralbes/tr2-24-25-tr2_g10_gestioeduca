<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        // Crear profesores
        Teacher::create([
            'first_name' => 'Dr. John',
            'last_name' => 'Doe',
            'email' => 'john.doe@university.com',
            'department' => 'Mathematics',
        ]);

        Teacher::create([
            'first_name' => 'Dr. Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@university.com',
            'department' => 'Physics',
        ]);

    }
}
