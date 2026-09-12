<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

// Redirige la raíz directamente al login
Route::redirect('/', '/login');

// Redirige el dashboard inteligentemente según el rol exacto
Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->rol === 'admin') {
        return redirect()->route('admin.test-db');
    }
    
    if ($user->rol === 'usuario') {
        return redirect()->route('client.productos');
    }

    // Si no tiene un rol válido reconocido
    auth()->logout();
    return redirect()->route('login')->withErrors(['email' => 'Tu cuenta no tiene un rol válido asignado.']);
})->middleware(['auth', 'verified', 'prevent-back-history'])->name('dashboard');

// Rutas protegidas exclusivamente para administradores
Route::middleware(['auth', 'admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/test-db', [AdminController::class, 'testDatabase'])->name('admin.test-db');
});

// Rutas protegidas exclusivamente para usuarios estándar ('usuario')
Route::middleware(['auth', 'client', 'prevent-back-history'])->group(function () {
    Route::get('/client/productos', [ClientController::class, 'productos'])->name('client.productos');
});

// Rutas generales para cualquier usuario autenticado (perfil)
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';