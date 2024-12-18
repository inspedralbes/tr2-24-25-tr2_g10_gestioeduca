<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Respostes",
 *     description="Endpoints per gestionar les respostes"
 * )
 */
class AnswerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/answers",
     *     summary="Llistar totes les respostes",
     *     tags={"Respostes"},
     *     @OA\Response(
     *         response=200,
     *         description="Llista de respostes obtinguda correctament",
     *     )
     * )
     */
    public function index()
    {
        $answers = Answer::all();
        return response()->json($answers);
    }

    /**
     * @OA\Get(
     *     path="/api/answers/{id}",
     *     summary="Obtenir una resposta específica per ID",
     *     tags={"Respostes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la resposta",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dades de la resposta",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resposta no trobada"
     *     )
     * )
     */
    public function show($id)
    {
        $answer = Answer::find($id);
        if (is_null($answer)) {
            return response()->json(['message' => 'Resposta no trobada'], 404);
        }
        return response()->json($answer);
    }

    /**
     * @OA\Post(
     *     path="/api/answers",
     *     summary="Crear una nova resposta",
     *     tags={"Respostes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"answer"},
     *             @OA\Property(property="answer", type="string", maxLength=255, example="Aquesta és una resposta d'exemple.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Resposta creada correctament",
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
            'answer' => 'required|string|max:255'
        ]);

        $answer = Answer::create($validatedData);

        return response()->json($answer, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/answers/{id}",
     *     summary="Actualitzar una resposta existent",
     *     tags={"Respostes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la resposta a actualitzar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="answer", type="string", maxLength=255, example="Text de la resposta actualitzada.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resposta actualitzada correctament",
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
            'answer' => 'sometimes|required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $answer = Answer::findOrFail($id);
        $answer->update($validator->validated());

        return response()->json($answer, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/answers/{id}",
     *     summary="Eliminar una resposta",
     *     tags={"Respostes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la resposta a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Resposta eliminada correctament"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resposta no trobada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        if (is_null($answer)) {
            return response()->json(['message' => 'Resposta no trobada'], 404);
        }
        $answer->delete();
        return response()->json(null, 204);
    }
}
