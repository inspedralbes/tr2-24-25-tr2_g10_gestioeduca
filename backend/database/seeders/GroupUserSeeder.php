<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = \App\Models\Group::all();
        $users = \App\Models\User::all();

        foreach ($groups as $group) {
            $group->users()->attach($users->random(4));
        }
    }
}
