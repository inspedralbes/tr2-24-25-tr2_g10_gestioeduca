<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        // Verifica si el usuario tiene el rol adecuado
        if (Auth::user()->hasRole('profesor') || Auth::user()->hasRole('admin')) {
    return response()->json(Course::all());
}


        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        return response()->json($course);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $course = Course::create($validated);

        return response()->json($course, 201);
    }


    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $course->update($validated);

        return response()->json($course);
    }


    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }
}
