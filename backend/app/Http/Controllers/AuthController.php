<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

class AuthController extends Controller
{
    use Notifiable;

    // Login del usuario
    public function login(Request $request)
    {
        // Validación de las credenciales
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Responder con los datos del usuario y el token
            $role = $user->roles()->first()->name;

            return response()->json([
                'message' => 'Login exitoso',
                'user' => $user,
                'role' => $role,
                'token' => $user->createToken('YourAppName')->plainTextToken, // Generar token
            ]);
        }

        return response()->json([
            'message' => 'Credenciales incorrectas',
        ], 401);
    }

    // Registro de nuevo usuario
    public function register(Request $request)
    {
        // Validación de los datos de registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:alumno,profesor', // Validación para el campo de rol
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol al usuario (alumno o profesor)
        $role = Role::where('name', $request->role)->first();
        $user->roles()->attach($role);

        // Generar un token para el usuario si estás usando Sanctum o Passport
        $token = $user->createToken('YourAppName')->plainTextToken;

        // Responder con los datos del usuario y el token
        return response()->json([
            'message' => 'Registro exitoso',
            'user' => $user,
            'role' => $role->name,
            'token' => $token,
        ], 201);
    }

    // Logout del usuario
    public function logout(Request $request)
    {
        // Revocar todos los tokens del usuario si usas Sanctum o Passport
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        Auth::logout();  // Logout tradicional (si es que no estás usando tokens)

        return response()->json([
            'message' => 'Logout exitoso',
        ]);
    }
}
