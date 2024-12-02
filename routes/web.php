<?php

use App\Http\Controllers\Admin\IngresoController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\BodegasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// Rutas públicas
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', 'SearchController@search')->name('search');
Route::post('/update-user-settings', 'UserController@updateSettings')->name('updateUserSettings');

// Rutas protegidas por autenticación y middleware 'admin'
Route::middleware(['web', 'auth', 'admin'])->group(function () {

    // Rutas de administración de usuarios
    Route::resource('usuario', AdminController::class);
    Route::resource('usuarios', UsuariosController::class);
    

    // Rutas para Categorías
    Route::resource('categorias', CategoriasController::class);

    // Rutas para profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Rutas para Marcas
    Route::resource('marca', MarcaController::class);

    // Rutas de Bodegas
    Route::resource('bodegas', BodegasController::class);
    Route::put('bodegas/deactivate/{bodega}', [BodegasController::class, 'deactivate'])->name('bodegas.deactivate');

    // Rutas de Ingreso
    Route::resource('ingreso', IngresoController::class);
    Route::get('ingreso/sendData', [IngresoController::class, 'sendData']);
    Route::post('ingreso', [IngresoController::class, 'store'])->name('ingreso.store');
    Route::get('ingreso/export', [IngresoController::class, 'export']);
    
    Route::get('download-pdf', [IngresoController::class, 'downloadPDF']);

    // Rutas CRUD para Productos (suponiendo que exista este controlador)
    Route::resource('productos', ProductoController::class);
});

// Rutas de operaciones generales fuera del middleware 'admin'
Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::get('/categorias', [CategoriasController::class, 'index']);
Route::get('/ingreso', [IngresoController::class, 'index'])->name('ingreso.index');
Route::get('/ingreso/{ingreso}/show', [IngresoController::class, 'show']);
Route::post('/ingreso', [IngresoController::class, 'sendData']);
Route::put('/ingreso/{ingreso}', [IngresoController::class, 'update']);
Route::delete('/ingreso/{ingreso}', [IngresoController::class, 'destroy']);


