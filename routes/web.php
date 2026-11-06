<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

// Página principal: redirigir al catálogo
Route::get('/', function () {
    return redirect()->route('peliculas.index');
});

// Rutas para todas las operaciones CRUD
Route::resource('peliculas', PeliculaController::class);
