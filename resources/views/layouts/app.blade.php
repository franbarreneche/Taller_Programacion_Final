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

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    
</head>

<body class="has-background-light">
    <x-navbar />
    <section class="section">
        <div class="container">
            <div class="has-text-centered pb-4">
                <p class="title">@yield("title")</p>
                <p class="subtitle">@yield("subtitle")</p>
            </div>
            <x-status-alert />

            @yield('content')
        </div>
    </section>

    <x-footer />
</body>

</html>