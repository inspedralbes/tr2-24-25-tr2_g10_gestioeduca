<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Division;
use App\Models\Group;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Laravel\Prompts\FormStep;

use function Laravel\Prompts\form;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        // Llama a otros seeders si es necesario
        $this->call([
            CourseSeeder::class,
            SubjectSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            DivisionSeeder::class,
            FormSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            GroupSeeder::class,
            GroupDivisionSeeder::class,
            GroupUserSeeder::class,
            GroupSubjectSeeder::class,
            GroupCourseSeeder::class,
        ]);
    }
}
