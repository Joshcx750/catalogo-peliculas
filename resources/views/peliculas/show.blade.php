
@extends('layouts.app')

@section('title', $pelicula->titulo . ' | CineManía')

@section('content')

<div style="max-width: 950px; margin: auto;">

    <a href="{{ route('peliculas.index') }}"
       class="btn btn-secondary"
       style="margin-bottom: 25px;">
        ← Volver al catálogo
    </a>

    <div class="card"
         style="display: grid; grid-template-columns: minmax(200px, 300px) 1fr; gap: 30px;">

        <div>
            @if($pelicula->portada)
                <img
                    src="{{ $pelicula->portada }}"
                    alt="{{ $pelicula->titulo }}"
                    style="width: 100%; border-radius: 10px; object-fit: cover;"
                >
            @else
                <div class="poster-placeholder"
                     style="height: 380px; border-radius: 10px;">
                    🎬
                </div>
            @endif
        </div>

        <div>

            <h1 class="page-title">
                {{ $pelicula->titulo }}
            </h1>

            <p class="page-description">
                Información completa de la película.
            </p>

            <p style="margin-bottom: 18px;">
                <strong>Director:</strong>
                <span style="color: var(--muted);">
                    {{ $pelicula->director }}
                </span>
            </p>

            <p style="margin-bottom: 18px;">
                <strong>Género:</strong>
                <span style="color: var(--muted);">
                    {{ $pelicula->genero }}
                </span>
            </p>

            <p style="margin-bottom: 18px;">
                <strong>Año de estreno:</strong>
                <span style="color: var(--muted);">
                    {{ $pelicula->anio }}
                </span>
            </p>

            <div style="margin-top: 30px;">

                <h3 style="margin-bottom: 12px;">
                    Sinopsis
                </h3>

                <p style="color: var(--muted); line-height: 1.8;">
                    {{ $pelicula->sinopsis ?: 'No se ha registrado una sinopsis.' }}
                </p>

            </div>

            <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 30px;">

                <a href="{{ route('peliculas.edit', $pelicula) }}"
                   class="btn">
                    Editar película
                </a>

                <a href="{{ route('peliculas.index') }}"
                   class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>

</div>

<style>
    @media (max-width: 650px) {
        .card {
            grid-template-columns: 1fr !important;
        }
    }
</style>

@endsection
