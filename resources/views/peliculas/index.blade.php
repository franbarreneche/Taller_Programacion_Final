@extends('layouts.app')

@section('title','PELICULAS')
@section('subtitle','Listado con todas las películas de '. auth()->user()->name)

@section('content')
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Películas
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-list"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="table-content">
      <table class="table is-fullwidth">
            <thead>
                <th>Agregada</th>
                <th>Titulo</th>
                <th>Estreno</th>
                <th>Idioma</th>
                <th>Rating</th>
                <th></th>
            </thead>
            <tbody>
                @forelse($peliculas as $pelicula)
                <tr>
                    <td><span class="tag is-white">{{(Illuminate\Support\Carbon::parse($pelicula->created_at))->format('d/m/Y H:i')}}hs</span></td>
                    <td><a href="{{route('peliculas.show',$pelicula->id)}}" class="has-text-info">{{$pelicula->titulo}}</a></td>
                    <td><span class="tag is-white">{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d/m/Y')}}</span></td>
                    <td>{{$pelicula->idioma}}</td>
                    <td>{{$pelicula->rating}}</td>
                    @if(auth()->user()->id === $pelicula->user_id)
                    <td class="is-grouped">
                        <form action="{{route('peliculas.destroy',$pelicula->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <a class="button is-small is-primary" href="{{route('peliculas.show',$pelicula->id)}}">Ver</a>
                        <a class="button is-small is-info" href="{{route('peliculas.edit',$pelicula->id)}}">Editar</a>
                        <button type="submit" class="button is-small is-danger">Elim</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @empty
                <tr><td>{{ __('Couldn\'t find any entries.') }}</td></tr>
                @endforelse
            </tbody>
      </table>
    </div>
  </div>
  <footer class="card-footer">
    <div class="card-footer-item">{{$peliculas->links()}}</div>
    @if(auth()->user())
    <div class="card-footer-item"><a class="button is-primary" href="{{route('peliculas.create')}}">Agregar Nueva</a></div>
    @endif
  </footer>
</div>
@endsection
