<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Masjid Al Manar Surabaya</title>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
{{-- <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masjid Al Manar Surabaya</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js',])
</head> --}}
<body>
    <div id="app">
        @include('layouts.nav')
        @yield('content')
        @vite('resources/js/app.js')
        @include('sweetalert::alert')
        @stack('scripts')
    </div>
</body>
</html>
