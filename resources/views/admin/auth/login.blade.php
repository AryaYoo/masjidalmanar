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
                <img src={{ Vite::asset('resources/images/logo.png')}} class="rounded-circle p-1"
                        alt="" width="150" height="150">
            </div>
            <div>
                <h2 class="fw-bold text-center">Selamat Datang di</h2>
                <h5 class="fw-lighter text-center">Masjid Al Manar Surabaya</h5>
            </div>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="row justify-content-center mt-4 mb-5">
                    <div class="p-4 bg-light rounded-3 border col-9">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input id="email" type="email"
                                    class="form-control my-3 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Enter Your Email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input id="password" type="password"
                                    class="form-control mb-3 @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Enter Your Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="row mb-4">
                                        <div class="col-5">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                            </div>
                                        </div>
                                        <div class="col-6 justify-content-end">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn text-white"
                                            style="background-color: rgb(26, 24, 156)">
                                            <i class="bi-arrow-left-circle me-2"></i>
                                                    {{ __('Login') }}
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="text-center mt-3 mb-3">
                                            <p >Jamaah Baru di Al Manar? <a href="{{ route('register') }}">Daftar Jamaah</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="col p-5" style="background-color: rgb(26, 24, 156)">
        </div>

    </div>
</body>

</html>

