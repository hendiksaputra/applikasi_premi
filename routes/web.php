<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarningCategoryController;
use App\Http\Controllers\LoadCategoryController;
use App\Http\Controllers\AttendanceCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UnitModelController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitPremiController;
use App\Http\Controllers\PlantUnitController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\WarningController;
use App\Http\Controllers\ProdParameterController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PremirekapController;


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
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');

    Route::get('warning_categories', [WarningCategoryController::class, 'index']);
    Route::get('warning_categories/add', [WarningCategoryController::class, 'add']);
    Route::post('warning_categories', [WarningCategoryController::class, 'addProcess']);
    Route::get('warning_categories/edit/{id}', [WarningCategoryController::class, 'edit']);
    Route::patch('warning_categories/{id}', [WarningCategoryController::class, 'editProcess']);
    Route::delete('warning_categories/{id}', [WarningCategoryController::class, 'delete']);

    Route::resource('load_categories', LoadCategoryController::class);

    Route::prefix('attendance_categories')->group(function(){
        Route::get('/', [AttendanceCategoryController::class, 'index'])->name('attendance_category.index');
        Route::get('/add', [AttendanceCategoryController::class, 'add']);
        Route::post('/', [AttendanceCategoryController::class, 'addProcess']);
        Route::get('/edit/{id}', [AttendanceCategoryController::class, 'edit']);
        Route::patch('/{id}', [AttendanceCategoryController::class, 'editProcess']);
        Route::delete('/{id}', [AttendanceCategoryController::class, 'delete']);
    });

    Route::get('projects/import', [ProjectController::class, 'import']);
    Route::post('projects/importProcess', [ProjectController::class, 'importProcess']);
    Route::get('projects', [ProjectController::class, 'index']);
    Route::get('projects/add', [ProjectController::class, 'add']);
    Route::post('projects', [ProjectController::class, 'addProcess']);
    Route::get('projects/edit/{id}', [ProjectController::class, 'edit']);
    Route::patch('projects/{id}', [ProjectController::class, 'editProcess']);
    Route::delete('projects/{id}', [ProjectController::class, 'delete']);

    Route::prefix('employees')->group(function(){
        Route::get('/data', [EmployeeController::class, 'index_data'])->name('employees.index.data');
        Route::get('/trash', [EmployeeController::class, 'trash']);
        Route::get('/restore/{id?}', [EmployeeController::class, 'restore']);
        Route::get('/delete/{id?}', [EmployeeController::class, 'delete']);
        Route::resource('/', EmployeeController::class)->parameters(['' => 'employee']);
    });

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

    Route::prefix('attendances')->group(function(){
        Route::get('/data', [AttendanceController::class, 'index_data'])->name('attendances.index.data');
        Route::get('/trash', [AttendanceController::class, 'trash']);
        Route::get('/restore/{id?}', [AttendanceController::class, 'restore']);
        Route::get('/delete/{id?}', [AttendanceController::class, 'delete']);
        Route::resource('/', AttendanceController::class)->parameters(['' => 'attendance']);
    });


    Route::get('warnings/data', [WarningController::class, 'index_data'])->name('warnings.index.data');
    Route::get('warnings/trash', [WarningController::class, 'trash']);
    Route::get('warnings/restore/{id?}', [WarningController::class, 'restore']);
    Route::get('warnings/delete/{id?}', [WarningController::class, 'delete']);
    Route::resource('warnings', WarningController::class);

    Route::prefix('prod_parameters')->group(function(){
        Route::get('/data', [ProdParameterController::class, 'index_data'])->name('prod_parameters.index.data');
        Route::get('/trash', [ProdParameterController::class, 'trash']);
        Route::get('/restore/{id?}', [ProdParameterController::class, 'restore']);
        Route::get('/delete/{id?}', [ProdParameterController::class, 'delete']);
        Route::resource('/', ProdParameterController::class)->parameters(['' => 'prod_parameter']);
        });
    

    

    Route::prefix('productions')->group(function(){
    Route::get('/data', [ProductionController::class, 'index_data'])->name('productions.index.data');
    Route::get('/restore/{id?}', [ProductionController::class, 'restore']);
    Route::post('/store', [ProductionController::class, 'store']);
    Route::resource('/', ProductionController::class)->parameters(['' => 'productions']);
    });


    Route::prefix('supports')->group(function(){
    Route::get('/data', [SupportController::class, 'index_data'])->name('supports.index.data');
    Route::get('/restore/{id?}', [SupportController::class, 'restore']);
    Route::post('/store', [SupportController::class, 'store']);
    Route::resource('/', SupportController::class)->parameters(['' => 'supports']);
    });

    Route::prefix('premirekaps')->group(function(){
    Route::get('/data', [PremirekapController::class, 'index_data'])->name('premirekaps.index.data');
    Route::get('periodes', [PremirekapController::class, 'getPeriode'])->name('periodes');
    Route::get('nik', [PremirekapController::class, 'getNik'])->name('nik');
    Route::get('premirekaps/records', [PremirekapController::class, 'records'])->name('premirekaps/records');
    Route::get('periodespt', [PremirekapController::class, 'getPeriodespt'])->name('periodespt');
    Route::get('nikspt', [PremirekapController::class, 'getNikspt'])->name('nikspt');
    Route::get('premirekaps/recordsupport', [PremirekapController::class, 'recordsupport'])->name('premirekaps/recordsupport');
    Route::get('periodeatc', [PremirekapController::class, 'getPeriodeatc'])->name('periodeatc');
    Route::get('nikatc', [PremirekapController::class, 'getNikatc'])->name('nikatc');
    Route::get('premirekaps/recordatc', [PremirekapController::class, 'recordatc'])->name('premirekaps/recordatc');
    Route::get('periodewarning', [PremirekapController::class, 'getPeriodewarning'])->name('periodewarning');
    Route::get('nikwarning', [PremirekapController::class, 'getNikwarning'])->name('nikwarning');
    Route::get('premirekaps/recordwarning', [PremirekapController::class, 'recordwarning'])->name('premirekaps/recordwarning');
    Route::post('/store', [PremirekapController::class, 'store']);
    Route::resource('/', PremirekapController::class)->parameters(['' => 'premirekaps']);
    });

