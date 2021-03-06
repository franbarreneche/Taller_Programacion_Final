@extends('layouts.app')

@section('title','Crear Película')
@section('subtitle','Agregar una nueva película al sistema')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            Crear nueva película
        </p>
        <a href="#" class="card-header-icon" aria-label="more options">
            <span class="icon">
                <i class="fas fa-film"></i>
            </span>
        </a>
    </header>
    <div class="card-content">
        <form action="{{route('peliculas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label">Título</label>
                <div class="control">
                    <input class="input" type="text" name="titulo" placeholder="Nombre de la peli" value="{{old('titulo')}}">
                </div>
                @error('titulo')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Fecha de Estreno</label>
                <div class="control">
                    <input class="input" type="date" name="fecha_estreno" value="{{old('fecha_estreno')}}">
                </div>
                @error('fecha_estreno')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Rating</label>
                <div class="control">
                    <input class="input" type="number" name="rating" value="{{old('rating')}}" min="0" max="10" step="0.1">
                </div>
                @error('rating')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Generos</label>
                <div class="select is-multiple is-fullwidth">
                <select name="generos[]" multiple size="8">
                    @foreach($generos as $genero)
                        <option value="{{$genero->id}}" @if(old('generos') && in_array($genero->id,old('generos'))) selected @endif > {{$genero->nombre}}       
                    @endforeach    
                </select>      
                </div>
                @error('generos')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="todo_publico" @if(old("todo_publico")) checked @endif>
                        Es para todo público
                    </label>
                </div>                
            </div>

            <div class="field">
                <label class="label">Idioma</label>
                <div class="control">
                    <div class="select">
                        <select name="idioma" required>
                            @foreach(App\Models\Pelicula::IDIOMAS as $key => $idioma)
                            <option value="{{$key}}" @if(old('idioma') == $key) selected @endif>{{$idioma}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('idioma')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Director</label>
                <div class="control">
                    <div class="select">
                        <select name="director" required>
                            @foreach($artistas as $director)
                            <option value="{{$director->id}}" @if(old('director') && $director->id == old('director')) selected @endif > {{$director->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('director')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Actores</label>
                <div class="select is-multiple is-fullwidth">
                <select name="actores[]" multiple size="8">
                    @foreach($artistas as $actor)
                        <option value="{{$actor->id}}"  @if(old('actores') && in_array($actor->id,old('actores'))) selected @endif > {{$actor->nombre}}        
                    @endforeach    
                </select>      
                </div>
                @error('actores')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Resumen</label>
                <div class="control">
                    <textarea class="textarea" name="resumen" placeholder="Pequeño resumen">{{old('resumen')}}</textarea>
                </div>
                @error('resumen')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field file">
                <label class="file-label">
                    <input class="file-input" name="poster" type="file" accept="image/*">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Seleccionar poster...
                        </span>
                    </span>
                    <span class="file-name" id="nombreArchivo">                    
                    </span>
                </label>
                @error('poster')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <input type="submit" class="button is-link" value="{{ __('Submit') }}">
                </div>
                <div class="control">
                    <a href="{{ url()->previous() }}" class="button is-link is-light">{{ __('Cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item"></div>
    </footer>
</div>
<script>
    var nombreArchivo = document.getElementById('nombreArchivo')
    var inputFile = document.querySelector('input[type="file"]');
    inputFile.onchange = function(e) {
        nombreArchivo.innerHTML = inputFile.files[0].name;
    };
</script>
@endsection