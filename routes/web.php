<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* El código anterior está creando un grupo de rutas a las que solo podrán acceder los usuarios que
hayan iniciado sesión y tengan el rol de administrador. */
/* Un middleware que verifica si el usuario ha iniciado sesión y tiene el rol de administrador. */
Route::middleware(['auth', 'admin'])->group(function () {
    

//rutas Productos
Route::get('/categorias', [App\Http\Controllers\admin\categoriasController::class, 'index']);
Route::get('/categorias/create', [App\Http\Controllers\admin\categoriasController::class, 'create']);
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\admin\categoriasController::class, 'edit']);
Route::post('/categorias', [App\Http\Controllers\admin\categoriasController::class, 'sendData']);
Route::put('/categorias/{categoria}', [App\Http\Controllers\admin\categoriasController::class, 'update']);
Route::delete('/categorias/{categoria}', [App\Http\Controllers\admin\categoriasController::class, 'destroy']);
Route::get('/inventario', [App\Http\Controllers\Admin\InventarioController::class, 'index']);
Route::get('/inventario/create', [App\Http\Controllers\Admin\InventarioController::class, 'create']);


//Rutas Admin

/* Creando las siguientes rutas: */
Route::resource('usuario',  'App\http\Controllers\admin\AdminController');

});
//Ruta usuarios
/* Crear un grupo de rutas al que solo puedan acceder los usuarios que hayan iniciado sesión y tengan
el rol de 'usuarios'. */
Route::middleware(['auth', 'usuario'])->group(function () {
Route::get('/categoria', [App\Http\Controllers\admin\categoriaController::class, 'index']);


});
