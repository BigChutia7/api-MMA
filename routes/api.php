<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NovedadController;


// Rutas del CRUD de productos
Route::get('/productos', [ProductoController::class, 'index']);      
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);  
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); 

// Rutas del CRUD de novedades
Route::get('/novedades', [NovedadController::class, 'index']); // Obtener todas las novedades
Route::post('/novedades', [NovedadController::class, 'store']); // Crear una novedad
Route::get('/novedades/{id}', [NovedadController::class, 'show']); // Obtener una novedad específica
Route::put('/novedades/{id}', [NovedadController::class, 'update']); // Actualizar una novedad
Route::delete('/novedades/{id}', [NovedadController::class, 'destroy']); // Eliminar una novedad