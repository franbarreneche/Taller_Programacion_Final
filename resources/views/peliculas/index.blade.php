@extends('layout.layout')

@section('contenido')
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
                @foreach($peliculas as $pelicula)
                <tr>
                    <td>{{$pelicula->titulo}}</td>
                    <td>{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d-m-Y')}}</td>
                    <td>{{$pelicula->idioma}}</td>
                    <td>{{$pelicula->rating}}</td>
                    <td>
                        <a class="button is-small is-primary" href="{{route('peliculas.show',$pelicula->id)}}">Ver</a>
                        <a class="button is-small is-info" href="{{route('peliculas.edit',$pelicula->id)}}">Editar</a>
                        <a class="button is-small is-danger">Elim</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
      </table>
    </div>
  </div>
  <footer class="card-footer">
    <a href="#" class="card-footer-item">Save</a>
    <a href="#" class="card-footer-item"></a>
    <a href="#" class="card-footer-item">Delete</a>
  </footer>
</div>
@endsection
