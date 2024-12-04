<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlumnoController;

Route::get('/professors', [ProfessorController::class, 'index']);
Route::get('/professors/{id}', [ProfessorController::class, 'show']);
Route::post('/professors', [ProfessorController::class, 'store']);

Route::get('/alumnos', [AlumnoController::class, 'index']); // Obtener todos los alumnos
Route::post('/alumnos', [AlumnoController::class, 'store']); // Crear un nuevo alumno
