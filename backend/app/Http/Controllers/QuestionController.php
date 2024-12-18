<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Questions",
 *     description="Endpoints per gestionar preguntes"
 * )
 */
class QuestionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/questions",
     *     summary="Llistar totes les preguntes",
     *     tags={"Questions"},
     *     @OA\Response(
     *         response=200,
     *         description="Llista de preguntes obtinguda correctament",
     *     )
     * )
     */
    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }

    /**
     * @OA\Get(
     *     path="/api/questions/{id}",
     *     summary="Obtenir una pregunta específica",
     *     tags={"Questions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la pregunta",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dades de la pregunta",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pregunta no trobada"
     *     )
     * )
     */
    public function show($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Pregunta no trobada'], 404);
        }
        return response()->json($question);
    }

    /**
     * @OA\Post(
     *     path="/api/questions",
     *     summary="Crear una nova pregunta",
     *     tags={"Questions"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"question"},
     *             @OA\Property(property="question", type="string", maxLength=255, example="Quina és la teva resposta?"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pregunta creada correctament",
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
            'question' => 'required|string|max:255'
        ]);

        $question = Question::create($validatedData);

        return response()->json($question, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/questions/{id}",
     *     summary="Actualitzar una pregunta existent",
     *     tags={"Questions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la pregunta a actualitzar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="question", type="string", maxLength=255, example="Pregunta actualitzada"),
     *             @OA\Property(property="form_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pregunta actualitzada correctament",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error de validació"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pregunta no trobada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Pregunta no trobada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'question' => 'sometimes|required|string|max:255',
            'form_id' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $question->update($validator->validated());

        return response()->json($question, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/questions/{id}",
     *     summary="Eliminar una pregunta",
     *     tags={"Questions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la pregunta a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Pregunta eliminada correctament",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pregunta no trobada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Pregunta no trobada'], 404);
        }
        $question->delete();
        return response()->json(null, 204);
    }
}
