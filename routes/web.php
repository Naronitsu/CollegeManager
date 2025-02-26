<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

//list all colleges
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');

//create college
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');

//stores contents of create college
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');

//edit college
Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');

//stores contents of edit college
Route::put('colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update');

//list all students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

//create student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

//stores contents of create student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

//edit student
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

//stores contents of edit students
Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');

//delete student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');