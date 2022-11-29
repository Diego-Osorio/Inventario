<?php

use App\Http\Controllers\Admin\ingresoController;
use App\Http\Controllers\Admin\ProductoController;
use App\Models\ingreso;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
Route::resource('usuario',  'App\http\Controllers\admin\AdminController');
/* Creación de las rutas para las operaciones CRUD. */
Route::get('/categorias', [App\Http\Controllers\admin\categoriasController::class, 'index']);
Route::get('/categorias/create', [App\Http\Controllers\admin\categoriasController::class, 'create']);
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\admin\categoriasController::class, 'edit']);
Route::post('/categorias', [App\Http\Controllers\admin\categoriasController::class, 'sendData']);
Route::put('/categorias/{categoria}', [App\Http\Controllers\admin\categoriasController::class, 'update']);
Route::delete('/categorias/{categoria}', [App\Http\Controllers\admin\categoriasController::class, 'destroy']);

Route::get('/marca', [App\Http\Controllers\admin\MarcaController::class, 'index']);
Route::get('/marca/create', [App\Http\Controllers\admin\MarcaController::class, 'create']);
Route::get('/marca/{marca}/edit', [App\Http\Controllers\admin\MarcaController::class, 'edit']);
Route::post('/marca', [App\Http\Controllers\admin\MarcaController::class, 'sendData']);
Route::put('/marca/{marca}', [App\Http\Controllers\admin\MarcaController::class, 'update']);
Route::delete('/marca/{marca}', [App\Http\Controllers\admin\MarcaController::class, 'destroy']);
/* Creando una ruta al método `index` en el `InventarioController`. */



Route::get('/ingreso/create', [App\Http\Controllers\Admin\ingresoController::class,'create']);

Route::get('/ingreso', [App\Http\Controllers\admin\ingresoController::class, 'index']);
/* Creando una ruta al método `sendData` en el `ingresoController`. */
Route::post('/ingreso', [App\Http\Controllers\admin\ingresoController::class, 'sendData']);
/* Creando una ruta al método `show` en el `ingresoController`. */
Route::get('/ingreso/{ingresos}/show', [App\Http\Controllers\admin\ingresoController::class, 'show']);
Route::put('/ingreso/{ingresos}', [App\Http\Controllers\admin\ingresoController::class, 'update']);
/* Creando una ruta al método `destroy` en el `ingresoController`. */
Route::delete('/ingreso/{ingreso}', [App\Http\Controllers\admin\ingresoController::class, 'destroy']);
Route::get('ingreso/export', [ingresoController::class, 'export']);
//salida

});


/* Creación de una ruta para el controlador de recursos. */
/* Creando una ruta para el controlador `usuariosController`. */

Route::resource('usuarios',  'App\http\Controllers\usuariosController');
Route::get('/categorias', [App\Http\Controllers\categoriaController::class, 'index']);
Route::get('/ingreso', [App\Http\Controllers\ingresosController::class, 'index']);
Route::get('/ingreso/{ingresos}/show', [App\Http\Controllers\ingresosController::class, 'show']);


