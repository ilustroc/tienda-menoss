<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Página de productos (lista categorías)
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Productos por categoría
Route::get('/productos/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/carrito/agregar', [App\Http\Controllers\CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/actualizar', [App\Http\Controllers\CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'ver'])->name('carrito.ver');

});

require __DIR__.'/auth.php';
