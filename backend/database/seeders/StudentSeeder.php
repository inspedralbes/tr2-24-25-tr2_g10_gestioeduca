<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Crear un estudiante
        Student::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('123456'), // Encriptamos la contraseña
            'phone' => '1234567890',
            'address' => '123 Main St, Springfield, IL',
            'current_course' => '1',
        ]);
    }
}
