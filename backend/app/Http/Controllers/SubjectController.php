<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/subjects",
     *     summary="Obtenir la llista d'assignatures",
     *     tags={"Subjects"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista d'assignatures obtenida correctament"
     *     )
     * )
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();
        if ($request->expectsJson()) {
        return response()->json($subjects, 200);
        }
        return view('subjects', compact('subjects'));
    }
    /**
     * @OA\Post(
     *     path="/api/subjects",
     *     summary="Crear una nova asignatura",
     *     tags={"Subjects"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dades necessaries per crear una nova asignatura",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Matemàtiques")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Assignatura creada correctament"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $subject = Subject::create($validatedData);
        if ($request->expectsJson()) {
            return response()->json($subject, 201);
        }
        return redirect()->route('subjects.index')->with('success', 'Asignatura creada correctamente');
    }

    /**
     * @OA\Get(
     *     path="/api/subjects/{id}",
     *     summary="Obtenir una asignatura",
     *     tags={"Subjects"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'assignatura",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Assignatura obtenida correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Assignatura no trobada"
     *     )
     * )
     */
    public function show(Request $request, $id)
    {
        // Buscar la asignatura por su ID
        $subject = Subject::find($id);

        // Si la asignatura no se encuentra
        if (is_null($subject)) {
            // Si la solicitud espera una respuesta JSON (API)
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Asignatura no encontrada'], 404);
            }
            // Para solicitudes web, redirigir con un mensaje de error
            return redirect()->route('subjects.index')->with('error', 'Asignatura no encontrada');
        }

        // Si la asignatura se encuentra y la solicitud espera JSON
        if ($request->expectsJson()) {
            return response()->json($subject, 200);
        }

        // Para solicitudes web, mostrar la vista con la asignatura
        return view('subjects.show', compact('subject'));
    }


    /**
     * @OA\Put(
     *     path="/api/subjects/{id}",
     *     summary="Actualitzar una asignatura",
     *     tags={"Subjects"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'assignatura",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dades necessaries per actualitzar l'assignatura",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Català")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Assignatura actualitzada correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Assignatura no trobada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        if (is_null($subject)) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $subject->update($request->all());
        return response()->json($subject, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/subjects/{id}",
     *     summary="Eliminar una asignatura",
     *     tags={"Subjects"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'assignatura",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Assignatura eliminada correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Assignatura no trobada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (is_null($subject)) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $subject->delete();
        return response()->json(null, 204);
    }
}
