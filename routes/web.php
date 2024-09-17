<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [ProfileController::class, 'enrolled'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::get('/courses', [CourseController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('courses');

Route::get('/courses/{code}', [CourseController::class, 'details'])
    ->middleware(['auth', 'verified'])
    ->name('course-details');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
