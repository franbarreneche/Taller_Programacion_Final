@extends('layouts.app')

@section('content')
      <div class="box">
          <p class="title">Bienvenido a el programa</p>
          <a class="button is-primary">Registrarse</a>
          <a class="button is-info" href="{{route('peliculas.index')}}">Ingresar</a>
      </div>
@endsection
