@extends('layouts.app')

@section('title','ARTISTAS')
@section('subtitle','Listado con todos los artistas')

@section('content')
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Artistas
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-list"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="table-content">
      <table class="table is-striped is-fullwidth">
            <thead>
                <th>Agregado</th>
                <th>Nombre</th>
            </thead>
            <tbody>
                @forelse($artistas as $artista)
                <tr>
                    <td>{{(Illuminate\Support\Carbon::parse($artista->created_at))->format('d-m-Y H:i')}}</td>
                    <td><a href="{{route('artistas.show',$artista->id)}}" class="has-text-info">{{$artista->nombre}}</a></td>                    
                </tr>
                @empty
                <tr>{{ __('Couldnt find any entries.') }}</tr>
                @endforelse
            </tbody>
      </table>
    </div>
  </div>
  <footer class="card-footer">
    <div class="card-footer-item">{{$artistas->links()}}</div>
  </footer>
</div>
@endsection
