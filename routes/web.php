<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WarningController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PlantUnitController;
use App\Http\Controllers\UnitModelController;
use App\Http\Controllers\UnitPremiController;
use App\Http\Controllers\LoadCategoryController;
use App\Http\Controllers\ProdParameterController;
use App\Http\Controllers\WarningCategoryController;
use App\Http\Controllers\AttendanceCategoryController;

Route::get('/', function () {
    return view('welcome', ['title' => 'Premi Operator Arka']);
});

Route::get('home', function () {
    return view('home');
});

Route::get('projects/import', [ProjectController::class, 'import']);
Route::post('projects/importProcess', [ProjectController::class, 'importProcess']);
Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/add', [ProjectController::class, 'add']);
Route::post('projects', [ProjectController::class, 'addProcess']);
Route::get('projects/edit/{id}', [ProjectController::class, 'edit']);
Route::patch('projects/{id}', [ProjectController::class, 'editProcess']);
Route::delete('projects/{id}', [ProjectController::class, 'delete']);

Route::resource('load_categories', LoadCategoryController::class);

Route::get('unit_models/data', [UnitModelController::class, 'index_data'])->name('unit_models.index.data');
Route::get('unit_models/import', [UnitModelController::class, 'import']);
Route::get('unit_models/export', [UnitModelController::class, 'export'])->name('export');
Route::post('unit_models/importProcess', [UnitModelController::class, 'importProcess']);
Route::resource('unit_models', UnitModelController::class);

Route::get('units/data', [UnitController::class, 'index_data'])->name('units.index.data');
Route::get('units/import', [UnitController::class, 'import']);
Route::post('units/importProcess', [UnitController::class, 'importProcess']);
Route::resource('units', UnitController::class);

Route::get('unit_premis/data', [UnitPremiController::class, 'index_data'])->name('unit_premis.index.data');
Route::resource('unit_premis', UnitPremiController::class);

Route::get('plant_units/data', [PlantUnitController::class, 'index_data'])->name('plant_units.index.data');
Route::resource('plant_units', PlantUnitController::class);

Route::get('employees/data', [EmployeeController::class, 'index_data'])->name('employees.index.data');
Route::get('employees/trash', [EmployeeController::class, 'trash']);
Route::get('employees/restore/{id?}', [EmployeeController::class, 'restore']);
Route::get('employees/delete/{id?}', [EmployeeController::class, 'delete']);
Route::resource('employees', EmployeeController::class);

Route::get('attendance_categories', [AttendanceCategoryController::class, 'index']);
Route::get('attendance_categories/add', [AttendanceCategoryController::class, 'add']);
Route::post('attendance_categories', [AttendanceCategoryController::class, 'addProcess']);
Route::get('attendance_categories/edit/{id}', [AttendanceCategoryController::class, 'edit']);
Route::patch('attendance_categories/{id}', [AttendanceCategoryController::class, 'editProcess']);
Route::delete('attendance_categories/{id}', [AttendanceCategoryController::class, 'delete']);

Route::get('warning_categories', [WarningCategoryController::class, 'index']);
Route::get('warning_categories/add', [WarningCategoryController::class, 'add']);
Route::post('warning_categories', [WarningCategoryController::class, 'addProcess']);
Route::get('warning_categories/edit/{id}', [WarningCategoryController::class, 'edit']);
Route::patch('warning_categories/{id}', [WarningCategoryController::class, 'editProcess']);
Route::delete('warning_categories/{id}', [WarningCategoryController::class, 'delete']);

Route::get('warnings/data', [WarningController::class, 'index_data'])->name('warnings.index.data');
Route::get('warnings/trash', [WarningController::class, 'trash']);
Route::get('warnings/restore/{id?}', [WarningController::class, 'restore']);
Route::get('warnings/delete/{id?}', [WarningController::class, 'delete']);
Route::resource('warnings', WarningController::class);

Route::resource('prod_parameters', ProdParameterController::class);
