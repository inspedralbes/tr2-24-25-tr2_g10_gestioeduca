<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para login
    public function login(Request $request)
    {
        // Validar los datos de la solicitud
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($validated)) {
            $user = Auth::user();

            // Generar un token para el usuario autenticado
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'message' => 'Login successful'
            ]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}


?>
