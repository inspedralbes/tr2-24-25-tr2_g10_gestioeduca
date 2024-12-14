<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    public function index()
    {
        $questions = Division::all();
        return response()->json($questions);
    }

    public function show($id)
    {
        $question = Division::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        return response()->json($question);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'division' => 'required|string|max:255'
        ]);

        $question = Division::create($validatedData);

        return response()->json($question, 201);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'division' => 'sometimes|required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $id->update($validator->validated());

        return response()->json($id, 200);
    }

    public function destroy($id)
    {
        $question = Division::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->delete();
        return response()->json(null, 204);
    }
}
