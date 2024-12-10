<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


// Rutas de autenticación (login, logout, register)
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
});

// Rutas protegidas por autenticación y roles
Route::middleware('auth')->group(function () {

    // Dashboard para el profesor
    Route::middleware('role:profesor')->get('/professor/dashboard', [UserController::class, 'professorDashboard'])->name('professor.dashboard');

    // Dashboard para el alumno
    Route::middleware('role:alumno')->get('/student/dashboard', [UserController::class, 'studentDashboard'])->name('student.dashboard');

    // Rutas para manejar recursos (CRUD) de Cursos y Materias
    Route::resource('courses', CourseController::class);
    Route::resource('subjects', SubjectController::class);

    // Rutas protegidas para la gestión de usuarios, solo para administradores
    Route::middleware('role:admin')->resource('users', UserController::class);

});
