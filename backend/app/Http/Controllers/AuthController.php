<?php

namespace App\Http\Controllers;

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


        if (Auth::attempt($validated)) {
            $user = Auth::user();


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
