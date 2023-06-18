<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PatientController,
    EmployeeController,
    SpecialtyController,
    OccupationController,
    ConsultationController,
    ConsultationTypeController,
    EmployeeSpecialtyController,
    HomeController,
    OccupationEmployeeController
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

    Route::post('user/foto-perfil',[HomeController::class,'foto'])->name('user.image');

    Route::get('patient/json', [PatientController::class,"json"])->name('patient.json');
    Route::get('employee/json', [EmployeeController::class,"json"])->name('employee.json');
    Route::get('consultation_type/json', [ConsultationTypeController::class,"json"])->name('consultation_type.json');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(["prefix" => "patient"], function () {
        Route::get('search', [PatientController::class, 'search'])->name('patient.search');
    });

    Route::group(["prefix" => "employee"], function () {
        Route::get('search', [EmployeeController::class, 'search'])->name('employee.search');
        Route::post('specialty', [EmployeeSpecialtyController::class, 'specialty'])->name('employee.specialty.action');
    });

    Route::group(["prefix" => "specialty"], function () {
        Route::get('search', [SpecialtyController::class, 'search'])->name('specialty.search');
        Route::post('employee', [EmployeeSpecialtyController::class, 'employee'])->name('specialty.employee.action');
    });

    Route::group(["prefix" => "occupation"], function () {
        Route::get('search', [OccupationController::class, 'search'])->name('occupation.search');

        Route::get('employee/list/{id}', [OccupationEmployeeController::class, 'employee_list'])->name('occupation.employee.list');
    });

    Route::group(["prefix" => "consultation_type"], function () {
        Route::get('search', [ConsultationTypeController::class, 'search'])->name('consultation_type.search');
    });

    Route::resource('patient', PatientController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('specialty', SpecialtyController::class);
    Route::resource('occupation', OccupationController::class);
    Route::resource('consultation', ConsultationController::class);
    Route::resource('consultation_type', ConsultationTypeController::class);


});
