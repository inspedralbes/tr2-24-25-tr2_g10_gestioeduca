<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/courses",
     *     summary="Obtenir la llista de cursos",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="Llista de cursos obtenida correctament",
     *     )
     * )
     */
    public function index()
    {
        $courses = Course::orderBy('name')->get();
        return response()->json($courses);
    }

    /**
     * @OA\Post(
     *     path="/api/courses",
     *     summary="Crear un curs",
     *     tags={"Courses"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Introducció a PHP"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Curs creat correctament",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validació"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $course = Course::create($validatedData);

        return response()->json($course, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/courses/{id}",
     *     summary="Un curs en concret",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="Detalls del curs",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Curs no trobat"
     *     )
     * )
     */
    public function show(Course $course)
    {
        return response()->json($course);
    }

    /**
     * @OA\Put(
     *     path="/api/courses/{id}",
     *     summary="Canviar el nom d'un curs",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del curs",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dades necessaries per actualitzar el curs",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Nou nom del curs"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Curs actualitzat correctament",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Curs no trobat"
     *     )
     * )
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $course->update($validatedData);

        return response()->json($course);
    }

    /**
     * @OA\Delete(
     *     path="/api/courses/{id}",
     *     summary="Borrar un curs",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del curs",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Curs borrat correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Curs no trobat"
     *     )
     * )
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
