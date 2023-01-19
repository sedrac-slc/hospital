<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PatientController,
    EmployeeController,
    SpecialtyController,
    OccupationController,
    ConsultationTypeController
};

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(["prefix" => "patient"], function () {
        Route::get('search', [PatientController::class, 'search'])->name('patient.search');
    });

    Route::group(["prefix" => "employee"], function () {
        Route::get('search', [EmployeeController::class, 'search'])->name('employee.search');
        Route::get('search/occupation', [EmployeeController::class, 'search_occupation'])->name('employee.search.occupation');
        Route::get('form/create', [EmployeeController::class, 'form_create'])->name('employee.form.occupation');
    });

    Route::group(["prefix" => "specialty"], function () {
        Route::get('search', [SpecialtyController::class, 'search'])->name('specialty.search');
    });

    Route::group(["prefix" => "occupation"], function () {
        Route::get('search', [OccupationController::class, 'search'])->name('occupation.search');
    });

    Route::group(["prefix" => "consultation_type"], function () {
        Route::get('search', [ConsultationTypeController::class, 'search'])->name('consultation_type.search');
    });

    Route::resource('patient', PatientController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('specialty', SpecialtyController::class);
    Route::resource('occupation', OccupationController::class);
    Route::resource('consultation_type', ConsultationTypeController::class);

});
