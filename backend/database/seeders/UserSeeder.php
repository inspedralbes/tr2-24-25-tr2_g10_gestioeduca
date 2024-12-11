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
        $adminRole = Role::where('name', 'admin')->first();

        // Crear usuario profesor y asociar el rol
        $profesorUser = User::create([
            'name' => 'Profesor User',
            'last_name' => 'Gago',
            'email' => 'profesor@example.com',
            'password' => Hash::make('profesor123'),
        ]);
        $profesorUser->role()->associate($profesorRole); // Asociar el rol
        $profesorUser->save();

        // Crear usuario alumno y asociar el rol
        $alumnoUser = User::create([
            'name' => 'Alumno User',
            'last_name' => 'Messi',
            'email' => 'alumno@example.com',
            'password' => Hash::make('alumno1235'),
        ]);
        $alumnoUser->role()->associate($alumnoRole); // Asociar el rol
        $alumnoUser->save();

        // Crear usuario admin y asociar el rol
        $adminUser = User::create([
            'name' => 'Admin',
            'last_name' => 'Iniesta',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin1234'),
        ]);
        $adminUser->role()->associate($adminRole); // Asociar el rol
        $adminUser->save();
    }
}
