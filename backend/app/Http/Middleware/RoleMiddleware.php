<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $roles)
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401); // No autenticado
        }

        // Convertir la lista de roles a un array
        $rolesArray = explode(',', $roles);

        // Verificar si el usuario tiene alguno de los roles
        foreach ($rolesArray as $role) {
            if ($user->roles()->where('name', $role)->exists()) {
                return $next($request);  // El usuario tiene uno de los roles permitidos
            }
        }

        // Si el usuario no tiene ninguno de los roles permitidos
        return response()->json(['error' => 'Unauthorized'], 403); // No tiene rol adecuado
    }
}
