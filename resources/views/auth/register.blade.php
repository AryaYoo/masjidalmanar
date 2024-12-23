<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="container-fluid">
    <div class="row">
        <div class="col p-4">
            <div class="text-center m-4">
                <img src={{ Vite::asset('resources/images/logo.png') }} class="rounded-circle p-1" alt=""
                    width="150" height="150">
            </div>
            <div>
                <h2 class="fw-bold text-center">Selamat Datang di</h2>
                <h5 class="fw-lighter text-center">Masjid Al Manar Surabaya</h5>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row justify-content-center mt-4 mb-5">
                    <div class="p-4 bg-light rounded-3 border col-xl-6">
                        <div class="row">
                            <div class="col-mb-3 mt-2">
                                <input id="name" type="text"
                                    class="form-control mb-3 @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Masukkan Nama">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="email" type="email"
                                    class="form-control mb-3 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required
                                    placeholder="Masukkan Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="nomor" type="nomor"
                                class="form-control mb-3 @error('nomor') is-invalid @enderror" name="nomor"
                                value="{{ old('nomor') }}" required
                                placeholder="Masukkan Nomor Hp ">
                            @error('nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                                <input id="password" type="password"
                                    class="form-control mb-3 @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Masukkan Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password-confirm" type="password" class="form-control mb-3"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Masukkan Ulang Password">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn text-white" style="background-color: #622200">
                                        <i class="bi bi-box-arrow-in-left"></i>
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="text-center mt-3">
                                        <p>Sudah punya akun? <a href="{{ route('login') }}">Log in disini</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="col p-5" style="background-color: #622200">
        </div>

    </div>
</body>

</html>
