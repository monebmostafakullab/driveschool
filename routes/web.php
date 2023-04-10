<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'dashboard'], function () {
    Route::resource('students', StudentController::class );
    Route::get('students/{student}/lessonscreate', [StudentController::class,'lessonscreate'])->name('students.lessonscreate');
    Route::resource('employees', EmployeeController::class );
    Route::resource('vehicles', VehicleController::class );
    Route::resource('lessons', LessonController::class );
});

