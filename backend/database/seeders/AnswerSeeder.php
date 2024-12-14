<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Answer::create([
            'answer' => 'Madrid',
            'question_id' => 1,
            'student_id' => 1,
        ]);
        Answer::create([
            'answer' => 'Barcelona',
            'question_id' => 2,
            'student_id' => 2,
        ]);
        Answer::create([
            'answer' => 'Valencia',
            'question_id' => 3,
            'student_id' => 2,
        ]);
        Answer::create([
            'answer' => 'Sevilla',
            'question_id' => 4,
            'student_id' => 2,
        ]);
        Answer::create([
            'answer' => 'Zaragoza',
            'question_id' => 5,
            'student_id' => 3,
        ]);
        Answer::create([
            'answer' => 'Malaga',
            'question_id' => 6,
            'student_id' => 3,
        ]);
        Answer::create([
            'answer' => 'Murcia',
            'question_id' => 7,
            'student_id' => 3,

        ]);
        Answer::create([
            'answer' => 'Palma',
            'question_id' => 8,
            'student_id' => 3,
        ]);
        Answer::create([
            'answer' => 'Bilbao',
            'question_id' => 9,
            'student_id' => 5,
        ]);
        Answer::create([
            'answer' => 'Alicante',
            'question_id' => 10,
            'student_id' => 5,
        ]);
        Answer::create([
            'answer' => 'Cordoba',
            'question_id' => 11,
            'student_id' => 5,
        ]);
        Answer::create([
            'answer' => 'Valladolid',
            'question_id' => 1,
            'student_id' => 11,
        ]);
        Answer::create([
            'answer' => 'Vigo',
            'question_id' => 2,
            'student_id' => 11,
        ]);
        Answer::create([
            'answer' => 'Gijon',
            'question_id' => 3,
            'student_id' => 11,
        ]);
        Answer::create([
            'answer' => 'L\'Hospitalet',
            'question_id' => 4,
            'student_id' => 21,
        ]);
        Answer::create([
            'answer' => 'Vitoria',
            'question_id' => 9,
            'student_id' => 21,
        ]);
        Answer::create([
            'answer' => 'Granada',
            'question_id' => 7,
            'student_id' => 21,
        ]);
        Answer::create([
            'answer' => 'Elche',
            'question_id' => 1,
            'student_id' => 10,
        ]);
        Answer::create([
            'answer' => 'Oviedo',
            'question_id' => 5,
            'student_id' => 10,
        ]);
        Answer::create([
            'answer' => 'Badalona',
            'question_id' => 6,
            'student_id' => 10,
        ]);
    }
}
