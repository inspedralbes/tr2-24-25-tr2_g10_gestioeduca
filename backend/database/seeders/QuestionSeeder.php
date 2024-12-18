<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'question' => '¿Cuál es la capital de España?',
            'form_id' => 1,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Francia?',
            'form_id' => 1,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Italia?',
            'form_id' => 2,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Alemania?',
            'form_id' => 2,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Portugal?',
            'form_id' => 3,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Reino Unido?',
            'form_id' => 3,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Japón?',
            'form_id' => 4,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de China?',
            'form_id' => 4,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Rusia?',
            'form_id' => 5,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Brasil?',
            'form_id' => 5,
        ]);
        Question::create([
            'question' => '¿Cuál es la capital de Argentina?',
            'form_id' => 5,
        ]);
    }
}
