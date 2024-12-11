<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/courses",
     *     summary="Get all courses",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="List of all courses",
     *     )
     * )
     */
    public function index()
    {
        $courses = Course::orderBy('name')->get();
        return response()->json($courses);
    }

    /**
     * @OA\Post(
     *     path="/api/courses",
     *     summary="Create a new course",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=201,
     *         description="Course created successfully",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $course = Course::create($validatedData);

        return response()->json($course, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/courses/{id}",
     *     summary="Get a specific course",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="Course details",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found"
     *     )
     * )
     */
    public function show(Course $course)
    {
        return response()->json($course);
    }

    /**
     * @OA\Put(
     *     path="/api/courses/{id}",
     *     summary="Update an existing course",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the course",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Course updated successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found"
     *     )
     * )
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $course->update($validatedData);

        return response()->json($course);
    }

    /**
     * @OA\Delete(
     *     path="/api/courses/{id}",
     *     summary="Delete a course",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the course",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Course deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found"
     *     )
     * )
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
