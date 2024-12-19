<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseDivisionSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     */
    public function run(): void
    {
        // Datos de ejemplo para course_division
        $courseDivisions = [
            ['course_id' => 1, 'division_id' => 3],
            ['course_id' => 1, 'division_id' => 4],
            ['course_id' => 2, 'division_id' => 3],
            ['course_id' => 2, 'division_id' => 4],
            ['course_id' => 3, 'division_id' => 5],
            ['course_id' => 3, 'division_id' => 6],
            ['course_id' => 4, 'division_id' => 3],
            ['course_id' => 4, 'division_id' => 4],
            ['course_id' => 5, 'division_id' => 3],
            ['course_id' => 5, 'division_id' => 4],
        ];

        foreach ($courseDivisions as $data) {
            // Verificar si el registro ya existe para evitar duplicados
            $exists = DB::table('course_division')
                ->where('course_id', $data['course_id'])
                ->where('division_id', $data['division_id'])
                ->exists();

            if (!$exists) {
                // Insertar si no existe el registro
                DB::table('course_division')->insert([
                    'course_id' => $data['course_id'],
                    'division_id' => $data['division_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
