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
            'name' => '1ero eso'
                ]);

        Course::create([
            'name' => '1ro bachillerato',
        ]);

    }
}
