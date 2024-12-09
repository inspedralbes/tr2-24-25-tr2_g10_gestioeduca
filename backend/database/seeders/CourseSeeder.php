<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Crear cursos
        Course::create([
            'course_name' => 'Mathematics',
            'year' => 2021,
        ]);

        Course::create([
            'course_name' => 'Science',
            'year' => 2022,
        ]);

    }
}
