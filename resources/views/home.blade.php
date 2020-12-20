@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="box app-box has-background-info py-6 mb-5">
        <h1 class="title has-text-white ">
            {{__('Welcome')}}, {{ Auth::user()->name }}!
        </h1>
        <h2 class="subtitle has-text-white">
            Elija alguna de las siguientes tareas para hacer.
        </h2>
        <div class="buttons is-grouped">
            <a href="{{route('peliculas.index')}}">Ver Listado de Mis peliculas</a>
        </div>
    </div>
@endsection
