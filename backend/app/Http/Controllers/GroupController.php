<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Groups",
 *     description="Endpoints per gestionar grups d'estudiants"
 * )
 */
class GroupController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/groups",
     *     summary="Llistar tots els grups",
     *     tags={"Groups"},
     *     @OA\Response(
     *         response=200,
     *         description="Llista de grups obtinguda correctament",
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Group::all());
    }

    /**
     * @OA\Post(
     *     path="/api/groups",
     *     summary="Crear un nou grup",
     *     tags={"Groups"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "number_of_students"},
     *             @OA\Property(property="name", type="string", maxLength=255, example="Grup A"),
     *             @OA\Property(property="description", type="string", nullable=true, example="Grup de matemàtiques"),
     *             @OA\Property(property="number_of_students", type="integer", example=25)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Grup creat correctament",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validació"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number_of_students' => 'required|integer',
        ]);

        $group = Group::create($validated);

        return response()->json($group, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/groups/{id}",
     *     summary="Obtenir un grup específic per ID",
     *     tags={"Groups"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del grup",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dades del grup",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Grup no trobat"
     *     )
     * )
     */
    public function show(string $id)
    {
        $group = Group::find($id);
        if (!$group) {
            return response()->json(['message' => 'Grup no trobat'], 404);
        }
        return response()->json($group);
    }

    /**
     * @OA\Put(
     *     path="/api/groups/{id}",
     *     summary="Actualitzar un grup existent",
     *     tags={"Groups"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del grup a actualitzar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "number_of_students"},
     *             @OA\Property(property="name", type="string", maxLength=255, example="Grup actualitzat"),
     *             @OA\Property(property="description", type="string", nullable=true, example="Descripció actualitzada"),
     *             @OA\Property(property="number_of_students", type="integer", example=30)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Grup actualitzat correctament",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Grup no trobat"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $group = Group::find($id);
        if (!$group) {
            return response()->json(['message' => 'Grup no trobat'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number_of_students' => 'required|integer',
        ]);

        $group->update($validated);

        return response()->json($group);
    }

    /**
     * @OA\Delete(
     *     path="/api/groups/{id}",
     *     summary="Eliminar un grup",
     *     tags={"Groups"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del grup a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Grup eliminat correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Grup no trobat"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $group = Group::find($id);
        if (!$group) {
            return response()->json(['message' => 'Grup no trobat'], 404);
        }
        $group->delete();
        return response()->json(['message' => 'Grup eliminat']);
    }
}
