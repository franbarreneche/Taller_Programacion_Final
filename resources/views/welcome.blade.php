<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin de Pelis' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Icons -->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" defer></script>

    <!-- typing effect -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/2.17.0/core.min.js"></script>


    <style>
        .card {
            margin-top: -100px;
        }

        .hero {
            background: linear-gradient(rgba(255, 255, 255, .9), rgba(255, 255, 255, .9)), url('/img/background.jpg');
            /*background-image: url('/img/background.jpg'); */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
    </style>
</head>

<body class="has-background-light">
    <section class="hero is-medium is-light">
        <div class="hero-head">
            <x-navbar />
        </div>

        <div class="hero-body">
            <div class="container has-text-centered">
                <x-application-mark class="fill-current has-text-dark" width="48" height="48" />
                <p class="title has-text-primary">Benvenido a Peliculator!</p>
                <div id="titulo-escribiendose" class="subtitle">
                </div>
            </div>
        </div>
        </div>

        <div class="hero-foot mb-4">

        </div>
    </section>


    <div class="container">
        <div class="card">
            <header class="card-header is-centered">
                <div class="container p-4">
                <form action="{{route('welcome')}}" method="GET"> 
                    <div class="field has-addons">                        
                        <div class="control has-icons-left is-expanded">
                            <input name="buscar" class="input is-large" type="text" placeholder="{{ __('Search by movie name')}}" value="{{Route::has('buscar')? Route::get('buscar') : ''}}">
                            <span class="icon is-left">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <div class="control">
                            <button class="button is-primary is-large">
                                {{ __('Search')}}
                            </button>
                        </div>
                    </div>
                        </form>
                </div>
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
                        </thead>
                        <tbody>
                            @forelse($peliculas as $pelicula)
                            <tr>
                                <td><span class="tag is-white">{{(Illuminate\Support\Carbon::parse($pelicula->created_at))->format('d/m/Y H:i')}}hs</span></td>
                                <td><a href="{{route('peliculas.show',$pelicula->id)}}" class="has-text-info">{{$pelicula->titulo}}</a></td>
                                <td><span class="tag is-white">{{(Illuminate\Support\Carbon::parse($pelicula->fecha_estreno))->format('d/m/Y')}}</span></td>
                                <td><span class="tag is-dark">{{$pelicula->idioma}}</span></td>
                                @if($pelicula->rating > 7)
                                <td><span class="tag is-success">{{$pelicula->rating}}</span></td>
                                @elseif($pelicula->rating >5)
                                <td><span class="tag is-warning">{{$pelicula->rating}}</span></td>
                                @else
                                <td><span class="tag is-danger">{{$pelicula->rating}}</span></td>
                                @endif
                            </tr>
                            @empty
                            <tr>{{ __('Couldnt find any entries.') }}</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">{{$peliculas->links()}}</div>
            </footer>
        </div>
    </div>





    <x-footer />
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script defer>
        var app = document.getElementById('titulo-escribiendose');

        var typewriter = new Typewriter(app, {
            loop: true
        });

        typewriter.typeString('Disfrutá de maravillosas películas')
            .pauseFor(2500)
            .deleteAll()
            .typeString('viví momentos increibles')
            .pauseFor(2500)
            .deleteChars(10)
            .typeString('de <em>PELICULA!</em>')
            .pauseFor(2500)
            .start();
    </script>
</body>

</html>