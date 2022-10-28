<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {
    

//rutas Productos
Route::get('/categorias', [App\Http\Controllers\admin\categoriasController::class, 'index']);
Route::get('/categorias/create', [App\Http\Controllers\admin\categoriasController::class, 'create']);
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\admin\categoriasController::class, 'edit']);
Route::post('/categorias', [App\Http\Controllers\admin\categoriasController::class, 'sendData']);
Route::put('/categorias/{categoria}', [App\Http\Controllers\admin\categoriasController::class, 'update']);
Route::delete('/categorias/{categoria}', [App\Http\Controllers\admin\categoriasController::class, 'destroy']);


});

//Rutas Admin

Route::resource('usuario',  'App\http\Controllers\admin\AdminController');


//ruta Inventarios
Route::middleware(['auth', 'producto'])->group(function () {

Route::get('/inventario', [App\Http\Controllers\Admin\InventarioController::class, 'edit']);
Route::get('/inventario/create', [App\Http\Controllers\Admin\InventarioController::class, 'create']);
});

//Rutas Usuarios
Route::middleware(['auth', 'categoria'])->group(function () {
    Route::get('/categoria', [App\Http\Controllers\Admin\categoriaController::class, 'index']);
    Route::get('/producto', [App\Http\Controllers\Admin\ProductoController::class, 'index']);

});