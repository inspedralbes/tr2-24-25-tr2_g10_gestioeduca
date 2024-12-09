<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    // GET: Obtener todos los alumnos
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json($alumnos);
    }

    // POST: Crear un nuevo alumno
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string',
            'curso_actual' => 'required|string|max:255',
        ]);

        $alumno = Alumno::create($validated);

        return response()->json([
            'message' => 'Alumno creado correctamente',
            'data' => $alumno
        ], 201);
    }
}
