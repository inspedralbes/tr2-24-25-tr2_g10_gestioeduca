<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('teacher_subjects_courses')) {
            Schema::create('teacher_subject_course', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con usuarios (profesores)
                $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade'); // Relación con materias
                $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Relación con cursos
                $table->integer('year'); // Año del curso (por ejemplo, 1er año, 2do año)
                $table->timestamps();
            });

        }
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_subjects_courses');
    }
};
