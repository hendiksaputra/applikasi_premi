<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitModelController;
use App\Http\Controllers\LoadCategoryController;

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

Route::resource('load_categories', LoadCategoryController::class);

Route::get('unit_models/data', [UnitModelController::class, 'index_data'])->name('unit_models.index.data');
Route::get('unit_models/import', [UnitModelController::class, 'import']);
Route::get('unit_models/export', [UnitModelController::class, 'export'])->name('export');
Route::post('unit_models/importProcess', [UnitModelController::class, 'importProcess']);
Route::resource('unit_models', UnitModelController::class);