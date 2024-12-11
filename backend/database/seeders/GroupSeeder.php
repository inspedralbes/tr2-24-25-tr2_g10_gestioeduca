<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'name' => 'Group 1',
            'description' => 'Description of Group 1',
            'number_of_students' => 2,
            'id_course' => 1,  // Asegúrate de que el id_course exista en la tabla courses
        ]);

        Group::create([
            'name' => 'Group 2',
            'description' => 'Description of Group 2',
            'number_of_students' => 2,
            'id_course' => 1,  // Asegúrate de que el id_course exista en la tabla courses
        ]);

        Group::create([
            'name' => 'Group 3',
            'description' => 'Description of Group 3',
            'number_of_students' => 2,
            'id_course' => 1,  // Asegúrate de que el id_course exista en la tabla courses
        ]);
    }
}
