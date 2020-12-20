@extends('layouts.app')

@section('content')
      <div class="box">
          <p class="title">Bienvenido a el programa</p>
          <div class="buttons">
                            <a href="{{ route('login') }}" class="button is-dark">
                                {{ __('Login') }}
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button is-primary">
                                    {{ __('Register') }}
                                </a>
                            @endif
                            <a  href="{{route('peliculas.index')}}" class="button is-light">Ver Listado de Peliculas</a>
        </div>
      </div>
@endsection
