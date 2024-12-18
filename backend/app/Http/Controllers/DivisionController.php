<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Divisions",
 *     description="Endpoints per gestionar les divisions"
 * )
 */
class DivisionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/divisions",
     *     summary="Llistar totes les divisions",
     *     tags={"Divisions"},
     *     @OA\Response(
     *         response=200,
     *         description="Llista de divisions obtinguda correctament",
     *     )
     * )
     */
    public function index()
    {
        $divisions = Division::all();
        return response()->json($divisions);
    }

    /**
     * @OA\Get(
     *     path="/api/divisions/{id}",
     *     summary="Obtenir una divisió específica per ID",
     *     tags={"Divisions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la divisió",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dades de la divisió",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Divisió no trobada"
     *     )
     * )
     */
    public function show($id)
    {
        $division = Division::find($id);
        if (is_null($division)) {
            return response()->json(['message' => 'Divisió no trobada'], 404);
        }
        return response()->json($division);
    }

    /**
     * @OA\Post(
     *     path="/api/divisions",
     *     summary="Crear una nova divisió",
     *     tags={"Divisions"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"division"},
     *             @OA\Property(property="division", type="string", maxLength=255, example="Divisió d'exemple")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Divisió creada correctament",
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
            'division' => 'required|string|max:255'
        ]);

        $division = Division::create($validatedData);

        return response()->json($division, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/divisions/{id}",
     *     summary="Actualitzar una divisió existent",
     *     tags={"Divisions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la divisió a actualitzar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="division", type="string", maxLength=255, example="Divisió actualitzada")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Divisió actualitzada correctament",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error de validació"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'division' => 'sometimes|required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $division = Division::findOrFail($id);
        $division->update($validator->validated());

        return response()->json($division, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/divisions/{id}",
     *     summary="Eliminar una divisió",
     *     tags={"Divisions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la divisió a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Divisió eliminada correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Divisió no trobada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $division = Division::find($id);
        if (is_null($division)) {
            return response()->json(['message' => 'Divisió no trobada'], 404);
        }
        $division->delete();
        return response()->json(null, 204);
    }
}
