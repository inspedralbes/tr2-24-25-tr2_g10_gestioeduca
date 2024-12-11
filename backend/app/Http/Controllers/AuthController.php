<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotificationMail;

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

                    // Crear un token de acceso
                    $token = $user->createToken('token')->plainTextToken;

                    // Enviar correo de notificación de inicio de sesión
                    Mail::to($user->email)->send(new LoginNotificationMail($user));

                    return response()->json([
                        'token' => $token,
                        'message' => 'Login successful',
                    ]);
                }

                return response()->json(['message' => 'Unauthorized'], 401);
            }
}


?>
