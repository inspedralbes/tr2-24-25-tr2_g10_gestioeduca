<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function getQuestionsAndAnswers($formId)
    {
        $form = Form::with(['questions.answers'])->find($formId);

        if (!$form) {
            return response()->json(['message' => 'Form not found'], 404);
        }

        return response()->json($form, 200);
    }



    public function index()
    {
        $questions = Form::all();
        return response()->json($questions);
    }

    public function show($id)
    {
        $question = Form::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        return response()->json($question);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $question = Form::create($validatedData);

        return response()->json($question, 201);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $id->update($validator->validated());

        return response()->json($id, 200);
    }

    public function destroy($id)
    {
        $question = Form::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->delete();
        return response()->json(null, 204);
    }
}
