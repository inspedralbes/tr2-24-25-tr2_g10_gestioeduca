<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        if (!Schema::hasTable('student_courses')) {
            Schema::create('student_courses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con los usuarios (alumnos)
                $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Relación con cursos
                $table->timestamps();
            });
        }
    }


    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
