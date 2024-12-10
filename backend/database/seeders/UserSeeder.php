<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesorRole = Role::where('name', 'profesor')->first();
        $alumnoRole = Role::where('name', 'alumno')->first();

        User::create([
            'name' => 'Profesor User',
            'email' => 'profesor@example.com',
            'password' => Hash::make('profesor123'),
        ])->roles()->attach($profesorRole);

        User::create([
            'name' => 'Alumno User',
            'email' => 'alumn3@example.com',
            'password' => Hash::make('alumno1235'),
        ])->roles()->attach($alumnoRole);

        User::create([
            'name' => 'Alumno User',
            'email' => 'alumno2@example.com',
            'password' => Hash::make('alumno1234'),
        ]);
    }
}
