<?php

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
    
   
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('unidadmedidas', App\Http\Controllers\UnidadmedidaController::class)->middleware('auth');

Route::resource('parroquias', App\Http\Controllers\ParroquiaController::class)->middleware('auth');
Route::resource('municipios', App\Http\Controllers\MunicipioController::class)->middleware('auth');
Route::resource('estados', App\Http\Controllers\EstadoController::class)->middleware('auth');

Route::resource('gabinetes', App\Http\Controllers\GabineteController::class)->middleware('auth');
Route::resource('corporaciones', App\Http\Controllers\CorporacioneController::class)->middleware('auth');
Route::resource('responsables', App\Http\Controllers\ResponsableController::class)->middleware('auth');

Route::resource('proyectos', App\Http\Controllers\ProyectoController::class)->middleware('auth');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('actividades', \App\Http\Controllers\ActividadeController::class)->middleware('auth');