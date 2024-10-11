<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/usuarios', [usuariosController::class, 'index'])->name('usuarios.index');
    Route::POST('/usuarios/nuevos', [usuariosController::class, 'create'])->name('usuarios.create');
    Route::get('/usuarios/editar/{id}', [usuariosController::class, 'edit'])->name('usuarios.edit');
    Route::delete('/usuarios/eliminar/{id}', [usuariosController::class, 'delete'])->name('usuarios.delete');
});


require __DIR__.'/auth.php';
