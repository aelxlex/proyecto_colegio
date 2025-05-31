<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DirectoraController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\RegenteController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\InventarioController;
use App\Http\Controllers\Admin\NotasController;
use App\Http\Controllers\Admin\AtrasoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('docentes', DocenteController::class);
    Route::get('docentes/{docente}/asistencia', [DocenteController::class, 'asistencia'])->name('docentes.asistencia'); // Cambiado aquí
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('inventario', InventarioController::class);
    Route::resource('notas', NotasController::class);
    Route::resource('atrasos', AtrasoController::class);
});

Route::middleware(['auth', 'role:directora'])->group(function () {
    Route::get('/directora', [DirectoraController::class, 'index'])->name('directora.dashboard');
});

Route::middleware(['auth', 'role:secretaria'])->group(function () {
    Route::get('/secretaria', [SecretariaController::class, 'index'])->name('secretaria.dashboard');
});

Route::middleware(['auth', 'role:regente'])->group(function () {
    Route::get('/regente', [RegenteController::class, 'index'])->name('regente.dashboard');
});

Route::middleware(['auth', 'role:docente'])->group(function () {
    Route::get('/docente', [DocenteController::class, 'index'])->name('docente.dashboard');
});
