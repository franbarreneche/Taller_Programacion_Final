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
                <table class="table is-striped is-fullwidth">
                 <tr><td>Fecha de Estreno:</td><td>{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d-m-Y')}}</td></tr>
                 <tr><td>Rating:</td><td>{{$pelicula->rating}}</td></tr>
                 <tr><td>Todo Público:</td><td>{{$pelicula->todo_publico? __('Yes') : __('No')}}</td></tr>
                 <tr><td>Idioma Principal:</td><td>{{$pelicula->idioma}}</td></tr>
                 <tr><td>Director:</td><td>Aca va el director</td></tr>
                 <tr><td>Actores:</td><td>Aca van los actores</td></tr>
                 <tr><td>Tag/Tags:</td><td>Aca van los tags</td></tr>
                 <tr><td>Resumen:</td><td>{{$pelicula->resumen}}</td></tr>
                 <tr><td>Agregada por:</td><td>{{$pelicula->user_id}}</td></tr>
                   
                </table>    
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