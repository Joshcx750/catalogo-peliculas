<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Consultar todas las películas
    public function index()
    {
        $peliculas = Pelicula::orderBy('id', 'desc')->get();

        return view('peliculas.index', compact('peliculas'));
    }

    // Mostrar formulario para agregar
    public function create()
    {
        return view('peliculas.create');
    }

    // Guardar una película nueva
    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'anio' => 'required|integer|min:1888|max:2100',
            'sinopsis' => 'nullable|string',
            'portada' => 'nullable|string|max:255',
        ]);

        Pelicula::create($datos);

        return redirect()->route('peliculas.index')
            ->with('success', 'Película agregada correctamente.');
    }

    // Consultar una película individual
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', compact('pelicula'));
    }

    // Mostrar formulario para editar
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    // Actualizar película
    public function update(Request $request, Pelicula $pelicula)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'anio' => 'required|integer|min:1888|max:2100',
            'sinopsis' => 'nullable|string',
            'portada' => 'nullable|string|max:255',
        ]);

        $pelicula->update($datos);

        return redirect()->route('peliculas.index')
            ->with('success', 'Película actualizada correctamente.');
    }

    // Eliminar película
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();

        return redirect()->route('peliculas.index')
            ->with('success', 'Película eliminada correctamente.');
    }
}
