<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        // Crear asignaturas
        Subject::create([
            'name' => 'Algebra',
            'description' => 'An introductory course to Algebra',
        ]);

        Subject::create([
            'name' => 'Calculus',
            'description' => 'An introductory course to Calculus',
        ]);

        // Crear más asignaturas según lo necesites
    }
}
