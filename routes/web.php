<?php

use App\Http\Controllers\BiometricoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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
    Route::resource('blogs', BlogController::class)->names('blogs');
    Route::resource('presenciales',DocentePresencialController::class)->names('presenciales');
    Route::resource('virtuales',DocenteVirtualController::class)->names('virtuales');
    Route::get('reporte/pdf/{id}',[App\Http\Controllers\BiometricoController::class,'crearPdf'])->name('reportes.pdf')->middleware('can:generar-reporte');
    Route::resource('biometrico',BiometricoController::class)->names('biometricos');
    
});
