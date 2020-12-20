@extends('layouts.app')

@section('title','PELICULAS')
@section('subtitle','Listado con todas las películas')

@section('content')
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Películas
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="table-content">
      <table class="table is-fullwidth">
            <thead>
                <th>Titulo</th>
                <th>Estreno</th>
                <th>Idioma</th>
                <th>Rating</th>
                <th></th>
            </thead>
            <tbody>
                @forelse($peliculas as $pelicula)
                <tr>
                    <td>{{$pelicula->titulo}}</td>
                    <td>{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d-m-Y')}}</td>
                    <td>{{$pelicula->idioma}}</td>
                    <td>{{$pelicula->rating}}</td>
                    @if(auth()->user())
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
                    @if(!auth()->user())
                    <td>{{$pelicula->user_id}}</td>
                    @endif
                </tr>
                @empty
                <tr>No se encontraron películas</tr>
                @endforelse
            </tbody>
      </table>
    </div>
  </div>
  <footer class="card-footer">
    <div class="card-footer-item">{{$peliculas->links()}}</div>
  </footer>
</div>
@endsection
