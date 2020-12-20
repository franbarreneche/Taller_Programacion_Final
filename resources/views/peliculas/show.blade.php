@extends('layouts.app')

@section('title','Detalles de Película')
@section('subtitle','Aquí se muestran los detalles de la película')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            Detalles
        </p>
        <a href="#" class="card-header-icon" aria-label="more options">
            <span class="icon">
                <i class="fas fa-film"></i>
            </span>
        </a>
    </header>
    <div class="card-content">
        <div class="columns">
            <div class="column">
                <p class="subtitle">{{$pelicula->titulo}}</p>
                <p><strong>Fecha de Estreno: </strong> {{$pelicula->fecha_estreno}}</p>
                <p><strong>Rating: </strong> {{$pelicula->rating}}</p>
                <p><strong>Todo Público: </strong> {{$pelicula->todo_publico? __('Yes') : __('No')}}</p>
                <p><strong>Idioma principal: </strong> {{$pelicula->idioma}}</p>
                <p><strong>Director: </strong> Acá va el directo</p>
                <p><strong>Actores: </strong> Acá van los actores</p>
                <p><strong>Tag/Tags: </strong> Acá van los tag/tags</p>
                <p><strong>Resumen: </strong> {{$pelicula->resumen}}</p>
                <p><strong>Usuario que la agregó: </strong> {{$pelicula->user_id}}</p>
            </div>
            <div class="column">
                <figure class="image is-2by3">
                    <img src="https://image.tmdb.org/t/p/w600_and_h900_bestv2{{$pelicula->imagen}}">
                </figure>
            </div>
        </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item"></div>
    </footer>
</div>
@endsection