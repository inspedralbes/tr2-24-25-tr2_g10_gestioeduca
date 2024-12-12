<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

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
    public function index()
    {
        return Subject::all();
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
        return Subject::create($request->all());
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
    public function show(Subject $subject)
    {
        return $subject;
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
    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        return $subject;
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
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(null, 204);
    }
}
