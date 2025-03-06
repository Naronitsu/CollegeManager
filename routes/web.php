<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Colleges Routes
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index'); // List all colleges
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create'); // Create college
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store'); // Store new college
Route::get('/colleges/{id}', [CollegeController::class, 'show'])->name('colleges.show'); // Show college details
Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit'); // Edit college
Route::put('/colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update'); // Update college
Route::delete('/colleges/{id}', [CollegeController::class, 'destroy'])->name('colleges.destroy'); // Delete college

// Students Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index'); // List all students
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create'); // Create student
Route::post('/students', [StudentController::class, 'store'])->name('students.store'); // Store new student
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show'); // Show student details
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit'); // Edit student
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update'); // Update student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy'); // Delete student
