
@extends('layouts.app')

@section('title', 'Catálogo | CineManía')

@section('content')

<style>
    .catalog-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 35px;
    }

    .movie-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 24px;
    }

    .movie-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        transition: transform .2s;
    }

    .movie-card:hover {
        transform: translateY(-5px);
    }

    .movie-poster {
        width: 100%;
        height: 290px;
        object-fit: cover;
        background: var(--surface-light);
        display: block;
    }

    .poster-placeholder {
        height: 290px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--surface-light);
        color: var(--muted);
        font-size: 55px;
    }

    .movie-info {
        padding: 18px;
    }

    .movie-title {
        font-size: 17px;
        margin-bottom: 9px;
    }

    .movie-detail {
        color: var(--muted);
        font-size: 13px;
        margin-bottom: 7px;
    }

    .movie-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 17px;
    }

    .movie-actions .btn {
        padding: 9px 11px;
        font-size: 12px;
    }

    .empty-state {
        text-align: center;
        padding: 65px 20px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 12px;
    }

    @media (max-width: 600px) {
        .catalog-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="catalog-header">
    <div>
        <h1 class="page-title">Nuestro catálogo</h1>
        <p class="page-description">
            Explora y administra tu colección de películas.
        </p>
    </div>

    <a href="{{ route('peliculas.create') }}" class="btn">
        + Agregar película
    </a>
</div>

@if($peliculas->count() > 0)

    <div class="movie-grid">

        @foreach($peliculas as $pelicula)

            <article class="movie-card">

                @if($pelicula->portada)
                    <img
                        src="{{ $pelicula->portada }}"
                        alt="{{ $pelicula->titulo }}"
                        class="movie-poster"
                    >
                @else
                    <div class="poster-placeholder">
                        🎬
                    </div>
                @endif

                <div class="movie-info">

                    <h2 class="movie-title">
                        {{ $pelicula->titulo }}
                    </h2>

                    <p class="movie-detail">
                        Director: {{ $pelicula->director }}
                    </p>

                    <p class="movie-detail">
                        Género: {{ $pelicula->genero }}
                    </p>

                    <p class="movie-detail">
                        Año: {{ $pelicula->anio }}
                    </p>

                    <div class="movie-actions">

                        <a href="{{ route('peliculas.show', $pelicula) }}"
                           class="btn">
                            Ver
                        </a>

                        <a href="{{ route('peliculas.edit', $pelicula) }}"
                           class="btn btn-secondary">
                            Editar
                        </a>

                        <form action="{{ route('peliculas.destroy', $pelicula) }}"
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta película?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>

                        </form>

                    </div>

                </div>

            </article>

        @endforeach

    </div>

@else

    <div class="empty-state">
        <div style="font-size: 55px; margin-bottom: 15px;">🎥</div>

        <h2>Todavía no hay películas</h2>

        <p class="page-description" style="margin-top: 12px;">
            Comienza agregando tu primera película al catálogo.
        </p>

        <a href="{{ route('peliculas.create') }}" class="btn">
            Agregar primera película
        </a>
    </div>

@endif

@endsection
