<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return response()->json($professors);
    }

    public function show($id)
    {
        $professor = Professor::findOrFail($id);
        return response()->json($professor);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors,email',
            'department' => 'required|string|max:255',
            'hire_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $professor = Professor::create($validator->validated());

        return response()->json($professor, 201);
    }
}