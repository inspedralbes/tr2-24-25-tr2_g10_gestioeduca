<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un alumno específico
        Alumno::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
            'direccion' => 'Calle Ficticia 123',
            'curso_actual' => '3er Año',
        ]);

        // Crear más alumnos utilizando la factoría
        Alumno::factory()->count(30)->create();
    }
}
