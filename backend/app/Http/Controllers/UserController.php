<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Mostrar el perfil del usuario autenticado
    public function showProfile()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        return response()->json(['user' => $user]);
    }

    // Asignar un rol a un usuario
    public function assignRole(Request $request, User $user)
    {
        // Validar los datos
        $request->validate([
            'role' => 'required|in:profesor,alumno',
        ]);

        // Obtener el rol seleccionado
        $role = Role::where('name', $request->role)->first();

        if ($role) {
            // Asignar el rol al usuario
            $user->roles()->attach($role);

            return response()->json(['success' => 'Rol asignado correctamente']);
        }

        return response()->json(['error' => 'Rol no válido'], 400);
    }

    // Asignar una materia a un profesor en un curso específico
    public function assignSubjectToTeacher(Request $request, User $user)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Verificar que el usuario sea un profesor
        if (!$user->hasRole('profesor')) {
            return response()->json(['error' => 'Este usuario no es un profesor'], 400);
        }

        // Asignar la materia al profesor para el curso específico
        $user->subjects()->attach($request->subject_id, ['course_id' => $request->course_id]);

        return response()->json(['success' => 'Materia asignada correctamente al profesor']);
    }

    // Asignar un curso a un alumno
    public function assignCourseToStudent(Request $request, User $user)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Verificar que el usuario sea un alumno
        if (!$user->hasRole('alumno')) {
            return response()->json(['error' => 'Este usuario no es un alumno'], 400);
        }

        // Asignar el curso al alumno
        $user->courses()->attach($request->course_id);

        return response()->json(['success' => 'Curso asignado correctamente al alumno']);
    }

    // Mostrar la lista de todos los usuarios
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios
        return response()->json(['users' => $users]);
    }

    // Mostrar el detalle de un usuario
    public function show(User $user)
    {
        return response()->json(['user' => $user]);
    }
}
