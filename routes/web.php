<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController; 
use Illuminate\Support\Facades\Route;

// Redirige la raíz directamente al login
Route::redirect('/', '/login');

// Redirige el dashboard por defecto de Laravel hacia tu panel de administración
Route::get('/dashboard', function () {
    return redirect()->route('admin.test-db');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas exclusivamente para administradores
Route::middleware(['auth', 'admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/test-db', [AdminController::class, 'testDatabase'])->name('admin.test-db');
});

// Rutas generales para cualquier usuario autenticado (como el perfil)
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';