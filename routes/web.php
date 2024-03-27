<?php

use App\Http\Controllers\Admin\ingresoController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\categoriasController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\BodegasController;
use App\Http\Middleware\UsuariosMiddleware;
use App\Models\ingreso;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', 'SearchController@search')->name('search');
Route::post('/update-user-settings', 'UserController@updateSettings')->name('updateUserSettings');

Route::middleware(['web', 'auth', 'admin'])->group(function () {
    Route::resource('usuario', 'App\Http\Controllers\Admin\AdminController');
    Route::resource('categorias', categoriasController::class);
    Route::resource('bodegas', BodegasController::class);
    Route::put('bodegas/deactivate/{bodega}', [BodegasController::class, 'deactivate'])->name('bodegas.deactivate');

  

    // Marcas
    // Intenta con la ruta absoluta
Route::get('/usuarios', 'App\Http\Controllers\UsuariosController@index');

    Route::resource('marca', MarcaController::class);


/* Creación de las rutas para las operaciones CRUD. */

Route::get('/categorias', [categoriasController::class, 'index']);
Route::get('/categorias/create', [categoriasController::class, 'create']);
Route::get('/categorias/{categoria}/edit', [categoriasController::class, 'edit']);
Route::post('/categorias', [categoriasController::class, 'store']);  // Cambiado a 'store'
Route::put('/categorias/{categoria}', [categoriasController::class, 'update']);
Route::delete('/categorias/{categoria}', [categoriasController::class, 'destroy']);


Route::get('/marca', [MarcaController::class, 'index']);
Route::get('/marca/create', [MarcaController::class, 'create']);
Route::get('/marca/{marca}/edit', [MarcaController::class, 'edit']);
Route::post('/marca', [MarcaController::class, 'sendData']);
Route::put('/marca/{marca}', [MarcaController::class, 'update']);
Route::delete('/marca/{marca}', [MarcaController::class, 'destroy']);
/* Creando una ruta al método `index` en el `InventarioController`. */

Route::get('/bodega', [BodegasController::class, 'index']);
Route::get('/bodega/create', [BodegasController::class, 'create']);
Route::get('/bodega/{bodegas}/edit', [BodegasController::class, 'edit']);
Route::post('/bodega', [BodegasController::class, 'sendData']);
Route::put('/bodega/{bodegas}', [BodegasController::class, 'update']);
Route::delete('/bodega/{bodegas}', [BodegasController::class, 'destroy']);


Route::get('/ingreso/create', [App\Http\Controllers\Admin\ingresoController::class,'create']);

Route::get('/ingreso', [ingresoController::class, 'index'])->name('ingreso.index');
/* Creando una ruta al método `sendData` en el `ingresoController`. */
Route::post('/ingreso', [ingresoController::class, 'sendData']);
/* Creando una ruta al método `show` en el `ingresoController`. */
Route::get('/ingreso/{ingresos}/show', [ingresoController::class, 'show']);
Route::put('/ingreso/{ingresos}', [ingresoController::class, 'update']);
/* Creando una ruta al método `destroy` en el `ingresoController`. */
Route::delete('/ingreso/{ingreso}', [ingresoController::class, 'destroy']);
Route::get('ingreso/export', [ingresoController::class, 'export']);
Route::get('download-pdf', [ingresoController::class, 'downloadPDF']);

//salida

});


/* Creación de una ruta para el controlador de recursos. */
/* Creando una ruta para el controlador `usuariosController`. */
Route::get('/usuarios', [usuariosController::class, 'index']);
Route::resource('usuarios',  'App\http\Controllers\usuariosController');
Route::get('/categorias', [App\Http\Controllers\categoriaController::class, 'index']);
Route::get('/ingreso', [App\Http\Controllers\ingresosController::class, 'index']);
Route::get('/ingreso/{ingresos}/show', [App\Http\Controllers\ingresosController::class, 'show']);