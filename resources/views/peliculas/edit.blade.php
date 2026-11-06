
@extends('layouts.app')

@section('title', 'Editar película | CineManía')

@section('content')

<div style="max-width: 750px; margin: auto;">

    <h1 class="page-title">Editar película</h1>

    <p class="page-description">
        Modifica la información de {{ $pelicula->titulo }}.
    </p>

    <div class="card">

        <form action="{{ route('peliculas.update', $pelicula) }}" method="POST">

            @csrf
            @method('PUT')

            <label for="titulo">Título de la película *</label>
            <input
                type="text"
                id="titulo"
                name="titulo"
                value="{{ old('titulo', $pelicula->titulo) }}"
                required
            >
            @error('titulo')
                <p style="color: #f87171; margin-top: -15px; margin-bottom: 15px;">{{ $message }}</p>
            @enderror

            <label for="director">Director *</label>
            <input
                type="text"
                id="director"
                name="director"
                value="{{ old('director', $pelicula->director) }}"
                required
            >
            @error('director')
                <p style="color: #f87171; margin-top: -15px; margin-bottom: 15px;">{{ $message }}</p>
            @enderror

            <label for="genero">Género *</label>
            <select id="genero" name="genero" required>
                @foreach(['Acción', 'Aventura', 'Ciencia ficción', 'Comedia', 'Drama', 'Fantasía', 'Terror', 'Suspenso', 'Animación', 'Romance', 'Documental'] as $genero)
                    <option value="{{ $genero }}"
                        {{ old('genero', $pelicula->genero) == $genero ? 'selected' : '' }}>
                        {{ $genero }}
                    </option>
                @endforeach
            </select>

            <label for="anio">Año de estreno *</label>
            <input
                type="number"
                id="anio"
                name="anio"
                min="1888"
                max="2100"
                value="{{ old('anio', $pelicula->anio) }}"
                required
            >

            <label for="sinopsis">Sinopsis</label>
            <textarea
                id="sinopsis"
                name="sinopsis"
                rows="5"
            >{{ old('sinopsis', $pelicula->sinopsis) }}</textarea>

            <label for="portada">URL de la portada (opcional)</label>
            <input
                type="url"
                id="portada"
                name="portada"
                value="{{ old('portada', $pelicula->portada) }}"
                placeholder="https://ejemplo.com/portada.jpg"
            >

            <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 10px;">

                <button type="submit" class="btn">
                    Guardar cambios
                </button>

                <a href="{{ route('peliculas.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
