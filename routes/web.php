<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UnitModelController;
use App\Http\Controllers\LoadCategoryController;
use App\Http\Controllers\UnitPremiController;

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