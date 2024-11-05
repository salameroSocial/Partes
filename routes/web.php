<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartesTrabajo;
use App\Http\Controllers\FieldController;
use Illuminate\Support\Facades\Route;

/*                                                                          \
|-------------------------------------------------------------------------- |
| Web Routes                                                                |
|-------------------------------------------------------------------------- |
|                                                                           |
| Here is where you can register web routes for your application. These     |
| routes are loaded by the RouteServiceProvider and all of them will        |
| be assigned to the "web" middleware group. Make something great!          |
|                                                                           |
|---------------------------------------------------------------------------|
\                                                                          */


Route::get('/', function () {
    return view('welcome');
});


/**
 * Rutas de testing
 */
Route::get('/pruebaPartes', [PartesTrabajo::class, 'prueba'])->name('prueba.prueba');
Route::get('/pruebaEmpleados', [EmpleadoController::class, 'prueba'])->name('prueba.pruebaEmpleado');
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
Route::get('/partes/nuevo/brigada', [PartesTrabajo::class, 'brigada'])->name('partes.brigada');
Route::get('/partes/index', [PartesTrabajo::class, 'index'])->name('partes.index');
Route::post('/partes/store', [PartesTrabajo::class, 'store'])->name('partes.store');
Route::put('/partes/{parte}', [PartesTrabajo::class, 'update'])->name('partes.update');
Route::get('/partes/{parte}/editar', [PartesTrabajo::class, 'edit'])->name('partes.editar');
Route::get('/partes/editar', [PartesTrabajo::class, 'works'])->name('partes.edita');
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/usuarios/crear', [AdminController::class, 'prueba'])->name('admin.usuarios.crear');
    Route::get('admin/fields', [FieldController::class, 'index'])->name('fields.index');
    Route::post('admin/fields', [FieldController::class, 'store'])->name('fields.store');
    Route::delete('admin/fields/{id}', [FieldController::class, 'destroy'])->name('fields.destroy');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/usuarios', [AdminController::class, 'indexUsuarios'])->name('admin.usuarios.index');
    Route::get('/usuarios/{id}/edit', [AdminController::class, 'editUsuarios'])->name('admin.usuarios.edit');
    Route::put('/usuarios/{id}', [AdminController::class, 'updateUsuarios'])->name('admin.usuarios.update');
    Route::delete('/usuarios/{id}', [AdminController::class, 'destroyUsuarios'])->name('admin.usuarios.destroy');
    Route::get('/admin/usuarios/create', [AdminController::class, 'createUsuario'])->name('admin.usuarios.create');
    Route::post('/admin/usuarios', [AdminController::class, 'storeUsuario'])->name('admin.usuarios.store');
    Route::get('/admin/roles', [AdminController::class, 'indexRoles'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [AdminController::class, 'createRol'])->name('admin.roles.create');
    Route::get('/admin/roles/show', [AdminController::class, 'createUsuario'])->name('admin.roles.show');
    Route::get('/admin/roles/show', [AdminController::class, 'createUsuario'])->name('admin.roles.store');
    Route::get('/admin/roles/edit', [AdminController::class, 'createUsuario'])->name('admin.roles.edit');
    Route::delete('/admin/roles/delete', [AdminController::class, 'createUsuario'])->name('admin.roles.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/partes/tipo', function () {
    return view('partes.tipo');
})->name('partes.seleccionar');

// Ruta para mostrar partes por tipo
Route::get('/partes/tipo/{tipo}', [PartesTrabajo::class, 'mostrarPorTipo'])->name('partes.tipo');



require __DIR__ . '/auth.php';

use App\Http\Controllers\RoleController;

Route::get('/asignar-rol/{userId}/{rol}', [RoleController::class, 'asignarRol']);
