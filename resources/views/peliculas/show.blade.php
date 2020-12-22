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
                 <tr><td>Director:</td><td> <span class="tag is-success is-light">{{$pelicula->director->nombre}}</span></td></tr>
                 <tr><td>Actores:</td><td>
                    @forelse($pelicula->actores as $actor)
                    <span class="tag is-link is-light">{{$actor->nombre}}</span>
                    @empty
                    <span class="tag is-danger is-light">{{ __('None')}}</span>
                    @endforelse
                 </td></tr>
                 <tr><td>Generos:</td><td>
                    @forelse($pelicula->generos as $genero)
                    <span class="tag is-link is-light">{{$genero->nombre}}</span>
                    @empty
                    <span class="tag is-danger is-light">{{ __('None')}}</span>
                    @endforelse
                 </td></tr>
                 <tr><td>Resumen:</td><td>{{$pelicula->resumen}}</td></tr>
                 <tr><td>Agregada por:</td><td>{{$pelicula->user->name}}</td></tr>                   
                </table>    
            </div>
            <div class="column">
                <figure class="image is-2by3">
                    @if(!$pelicula->poster)
                    <img src="https://via.placeholder.com/540x810">
                    @elseif(filter_var($pelicula->poster, FILTER_VALIDATE_URL))
                    <img src="{{$pelicula->poster}}">
                    @else
                    <img src="{{asset('storage/posters/'.    $pelicula->poster)}}">
                    @endif
                </figure>
            </div>
        </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item"><a href="{{ url()->previous() }}">{{ __('Back') }}</a></div>
    </footer>
</div>
@endsection