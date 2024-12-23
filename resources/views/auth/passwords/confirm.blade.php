@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col p-4">
        <div class="text-center m-4">
            <img src={{ Vite::asset('resources/images/logo.png')}} class="rounded-circle p-1"
                    alt="" width="150" height="150">
        </div>
        <div>
            <h2 class="fw-bold text-center">{{ __('Confirm Password') }}</h2>
            <h5 class="fw-lighter text-center">Masjid Al Manar Surabaya</h5>
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="row justify-content-center mt-4 mb-5">
                <div class="p-4 bg-light rounded-3 border col-9">
                    <div class="row">
                        <div class="col mb-5">
                            <p class="text-center">{{ __('Please confirm your password before continuing.') }}</p>

                            <div class="mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn text-white" style="background-color: #622200">
                                    {{ __('Confirm Password') }}
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col p-5" style="background-color: #622200">
    </div>
</div>
@endsection
