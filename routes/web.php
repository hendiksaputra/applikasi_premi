<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UnitModelController;
use App\Http\Controllers\UnitPremiController;
use App\Http\Controllers\LoadCategoryController;

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

Route::resource('unit_premis', UnitPremiController::class);

Route::get('employees/trash', [EmployeeController::class, 'trash']);
Route::get('employees/restore/{id?}', [EmployeeController::class, 'restore']);
Route::get('employees/delete/{id?}', [EmployeeController::class, 'delete']);
Route::resource('employees', EmployeeController::class);

Route::resource('prod_parameters', ProdParameterController::class);
