<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocentePresencialController;
use App\Http\Controllers\DocenteVirtualController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;



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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class)->names('roles');
    Route::resource('usuarios', UsuarioController::class)->names('usuarios');
    Route::resource('docentes',DocenteController::class)->names('docentes')->middleware('can:ver-docentes');
    Route::get('/reporte/pdf/{id}',[App\Http\Controllers\BiometricoController::class,'crearPDF'])->name('reportes.crearPDF')->middleware('can:generar-reporte');
    Route::get('/biometrico/{id}',[App\Http\Controllers\BiometricoController::class,'index'])->name('biometrico.index');
    Route::get('/biometrico',[App\Http\Controllers\BiometricoController::class,'create'])->name('biometrico.create');
    Route::post('/biometrico',[App\Http\Controllers\BiometricoController::class,'store'])->name('biometrico.store');
    Route::get('/distributivos/{id}',[App\Http\Controllers\DistributivoController::class,'index'])->name('distributivo.index');
    Route::get('/distributivos',[App\Http\Controllers\DistributivoController::class,'create'])->name('distributivo.create');
    Route::post('/distributivos',[App\Http\Controllers\DistributivoController::class,'store'])->name('distributivo.store');
    
    
});
