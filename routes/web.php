<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PartesTrabajo;
use App\Http\Controllers\FieldController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


/**
 * Rutas de testing
 */
// Route::get('/nav', function () {
//     return view('layouts.navDos');
// });
// Route::get('/log', function () {
//     return view('auth.login-dos');
// });


/**
 * Rutas para la gestion de empleados 
 */
Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

/**
 * Rutas para la gestion de los clientes
 */
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// Route::resource('partes', PartesTrabajo::class);
/**
 * Rutas crud para los partes de trabajo
 */
Route::get('/partes/nuevo', [PartesTrabajo::class, 'create'])->name('partes.nuevo');
Route::get('/partes/index', [PartesTrabajo::class, 'index'])->name('partes.index');
Route::post('/partes/store', [PartesTrabajo::class, 'store'])->name('partes.store');
Route::put('/partes/{parte}', [PartesTrabajo::class, 'update'])->name('partes.update');
Route::get('/partes/{parte}/editar', [PartesTrabajo::class, 'edit'])->name('partes.editar');
Route::delete('/partes/{parte}/borrar', [PartesTrabajo::class, 'borrar'])->name('partes.borrar');
Route::get('/partes/{parte}', [PartesTrabajo::class, 'show'])->name('partes.show');
Route::get('/exportarHoja', [PartesTrabajo::class, 'mostrarVista'])->name('prueba.exportarHoja');
Route::get('/exportarExcel', [PartesTrabajo::class, 'exportar'])->name('partes.exportar');
// Route::post('/filtrar-partes', [PartesTrabajo::class, 'filtrar'])->name('filtrar.partes');

// Dia 11/06 generado para preview y filtro lateral
Route::get('export/form', [PartesTrabajo::class, 'showForm'])->name('export.form');
Route::get('export', [PartesTrabajo::class, 'export'])->name('export');
Route::get('preview', [PartesTrabajo::class, 'preview'])->name('preview');

// Nuevas rutas para administrar los campos dinamicos
Route::get('admin/fields', [FieldController::class, 'index'])->name('fields.index');
Route::post('admin/fields', [FieldController::class, 'store'])->name('fields.store');
Route::delete('admin/fields/{id}', [FieldController::class, 'destroy'])->name('fields.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
