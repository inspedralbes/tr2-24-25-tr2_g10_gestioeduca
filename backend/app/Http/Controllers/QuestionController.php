<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller{


    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }

    public function show($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        return response()->json($question);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255'
        ]);

        $question = Question::create($validatedData);

        return response()->json($question, 201);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'sometimes|required|string|max:255',
            'form_id' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $id->update($validator->validated());

        return response()->json($id, 200);
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->delete();
        return response()->json(null, 204);
    }
}
