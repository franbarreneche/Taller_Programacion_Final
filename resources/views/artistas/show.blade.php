@extends('layouts.app')

@section('title','Detalles de Artista')
@section('subtitle','Aquí se muestran los detalles del artista')

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
        <div class="field">
            <label class="label">Nombre</label>
            <p>{{$artista->nombre}}</p>
        </div>
        <div class="table-container">
            <label class="label">Películas que dirigió</label>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <th>Título</th>
                    <th>Fecha Estreno</th>
                    <th>Rating</th>
                </thead>
                <tbody>
                    @forelse($artista->peliculasDirigidas as $pelicula)
                    <tr>
                        <td><a href="{{route('peliculas.show',$pelicula->id)}}" class="has-text-info">{{$pelicula->titulo}}</a></td>
                        <td>{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d-m-Y')}}</td>
                        <td>{{$pelicula->rating}}</td>
                    </tr>
                    @empty
                    <tr>{{ __('Couldnt find any entries.') }}</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="table-container">
            <label class="label">Películas en las que actuó</label>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <th>Título</th>
                    <th>Fecha Estreno</th>
                    <th>Rating</th>
                </thead>
                <tbody>
                    @forelse($artista->peliculasActuadas as $pelicula)
                    <tr>
                        <td><a href="{{route('peliculas.show',$pelicula->id)}}" class="has-text-info">{{$pelicula->titulo}}</a></td>
                        <td>{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d-m-Y')}}</td>
                        <td>{{$pelicula->rating}}</td>
                    </tr>
                    @empty
                    <tr>{{ __('Couldnt find any entries.') }}</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item"><a href="{{ url()->previous() }}">{{ __('Back') }}</a></div>
    </footer>
</div>
@endsection