<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Group;
use PhpParser\Node\Stmt\GroupUse;

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
            GroupSeeder::class,
            GroupUserSeeder::class,
        ]);
    }
}
