<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Obtenir tots els usuaris",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Llista d'usuaris obtinguda correctament"
     *     )
     * )
     */
    public function index()
    {
        return User::all();
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Crear un nou usuari",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dades del nou usuari",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string", example="Joan"),
     *             @OA\Property(property="email", type="string", example="joan@example.com"),
     *             @OA\Property(property="password", type="string", example="123456")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuari creat correctament"
     *     )
     * )
     */
    public function store(Request $request)
    {
        return User::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     summary="Obtenir un usuari específic",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'usuari",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuari obtingut correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuari no trobat"
     *     )
     * )
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *     summary="Actualitzar un usuari existent",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'usuari",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dades actualitzades de l'usuari",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Joana"),
     *             @OA\Property(property="email", type="string", example="joana@example.com"),
     *             @OA\Property(property="password", type="string", example="654321")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuari actualitzat correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuari no trobat"
     *     )
     * )
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Eliminar un usuari",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'usuari",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Usuari eliminat correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuari no trobat"
     *     )
     * )
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
