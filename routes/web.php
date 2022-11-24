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
/* Creando una ruta para el método create en el ingresoController. */
Route::get('/ingreso', [App\Http\Controllers\admin\ingresoController::class, 'create']);
Route::post('/ingreso', [App\Http\Controllers\Admin\ingresoController::class, 'sendData']);
Route::get('/ingreso/{ingreso}/edit', [App\Http\Controllers\admin\ingresoController::class, 'edit']);
Route::put('/ingreso/{ingreso}', [App\Http\Controllers\admin\ingresoController::class, 'update']);
Route::delete('/ingreso/{ingreso}', [App\Http\Controllers\admin\ingresoController::class, 'destroy']);
//salida
/* Creando una ruta para el controlador de salida. */
Route::get('/salida', [App\Http\Controllers\admin\salidaController::class, 'create']);
Route::post('/salida', [App\Http\Controllers\admin\salidaController::class, 'sendData']);
Route::get('/salida/{salida}/edit', [App\Http\Controllers\admin\salidaController::class, 'edit']);
Route::put('/salida/{salida}', [App\Http\Controllers\admin\salidaController::class, 'update']);
Route::delete('/salida/{salida}', [App\Http\Controllers\admin\salidaController::class, 'destroy']);




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
