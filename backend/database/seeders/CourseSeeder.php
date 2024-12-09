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
            'course_name' => '1 ESO',
            'year' => 2024,
        ]);

        Course::create([
            'course_name' => '2 ESO',
            'year' => 2024,
        ]);

        Course::create([
            'course_name' => '3 ESO',
            'year' => 2024,
        ]);

        Course::create([
            'course_name' => '4 ESO',
            'year' => 2024,
        ]);

        Course::create([
            'course_name' => '1 Bachilletaro',
            'year' => 2024,
        ]);

        Course::create([
            'course_name' => '2 Bachillerato',
            'year' => 2024,
        ]);

    }
}
