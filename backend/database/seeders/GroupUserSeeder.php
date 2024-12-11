<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GroupUserSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     */
    public function run(): void
    {
        DB::table('group_user')->insert([
            ['id_group' => 1, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_group' => 1, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_group' => 2, 'user_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
