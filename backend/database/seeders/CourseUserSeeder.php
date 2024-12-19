<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Division;
use Faker\Factory as Faker;

class CourseUserSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     */
    public function run(): void
    {
        // Obtener todos los usuarios con role_id = 2 (estudiantes)
        $students = User::where('role_id', 2)->get();

        // Obtener todos los cursos y divisiones disponibles
        $courses = Course::all();
        $divisions = Division::all();

        // Array para insertar las relaciones en course_user y course_division
        $courseUsers = [];
        $courseDivisions = [];

        // Instanciar Faker para generar divisiones aleatorias si es necesario
        $faker = Faker::create();

        // Asignar curso y división aleatoria a los estudiantes
        foreach ($students as $student) {
            // Asignar un curso aleatorio
            $randomCourse = $courses->random();

            // Asignar una división aleatoria para ese curso
            $randomDivision = $divisions->random();

            // Crear la relación en course_user
            $courseUsers[] = [
                'course_id' => $randomCourse->id,
                'user_id' => $student->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Evitar duplicados en course_division (verificar existencia previa)
            if (!DB::table('course_division')
                    ->where('course_id', $randomCourse->id)
                    ->where('division_id', $randomDivision->id)
                    ->exists()) {
                // Crear la relación en course_division
                $courseDivisions[] = [
                    'course_id' => $randomCourse->id,
                    'division_id' => $randomDivision->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insertar las relaciones de estudiantes con cursos
        DB::table('course_user')->insert($courseUsers);

        // Insertar las relaciones entre cursos y divisiones (sin duplicados)
        DB::table('course_division')->insert($courseDivisions);
    }
}
