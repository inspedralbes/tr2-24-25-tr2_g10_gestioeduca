<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form::create([
            'title' => 'Formulario de actitud',
        ]);

        Form::create([
            'title' => 'Formulario de asistencia',
        ]);

        Form::create([
            'title' => 'Formulario de rendimiento',
        ]);

        Form::create([
            'title' => 'Formulario de comportamiento',
        ]);

        Form::create([
            'title' => 'Formulario de satisfacción',
        ]);
    }
}
