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

