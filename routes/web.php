<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;

Route::resource('colleges', CollegeController::class);
Route::resource('students', StudentController::class);




Route::get('/', [HomeController::class, 'index'])->name('home');