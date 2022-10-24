<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//rutas Productos
Route::get('/categorias', [App\Http\Controllers\categoriasController::class, 'index']);

Route::get('/categorias/create', [App\Http\Controllers\categoriasController::class, 'create']);
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\categoriasController::class, 'edit']);
Route::post('/categorias', [App\Http\Controllers\categoriasController::class, 'sendData']);

Route::put('/categorias/{categoria}', [App\Http\Controllers\categoriasController::class, 'update']);
Route::delete('/categorias/{categoria}', [App\Http\Controllers\categoriasController::class, 'destroy']);


//Rutas Admin

Route::resource('usuario',  'App\http\Controllers\AdminController');


//Rutas Usuariosv 
Route::resource('usuarius',  'App\http\Controllers\AdminController');