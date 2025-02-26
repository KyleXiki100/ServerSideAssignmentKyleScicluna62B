<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;


Route::resource('colleges', CollegeController::class);
Route::resource('students', StudentController::class);


Route::get('/', function () {
    return view('welcome');
});
