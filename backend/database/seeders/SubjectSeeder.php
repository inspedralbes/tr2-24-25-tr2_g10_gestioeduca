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
            'subject_name' => 'Algebra',
            'description' => 'An introductory course to Algebra',
        ]);

        Subject::create([
            'subject_name' => 'Calculus',
            'description' => 'An introductory course to Calculus',
        ]);

        Subject::create([
            'subject_name' => 'Science',
            'description' => 'An introductory course to Science',
        ]);

        Subject::create([
            'subject_name' => 'Literature',
            'description' => 'An introductory course to Literature',
        ]);


        Subject::create([
            'subject_name' => 'History',
            'description' => 'An introductory course to History',
        ]);


        Subject::create([
            'subject_name' => 'Biology',
            'description' => 'An introductory course to Biology',
        ]);

        Subject::create([
            'subject_name' => 'Economics',
            'description' => 'An introductory course to Economics',
        ]);

        // Crear más asignaturas según lo necesites
    }
}
