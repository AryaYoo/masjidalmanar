@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col p-4">
        <div class="text-center m-4">
            <img src={{ Vite::asset('resources/images/logo.png')}} class="rounded-circle p-1"
                    alt="" width="150" height="150">
        </div>
        <div>
            <h2 class="fw-bold text-center">{{ __('Reset Password') }}</h2>
            <h5 class="fw-lighter text-center">Masjid Al Manar Surabaya</h5>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="row justify-content-center mt-4 mb-5">
                <div class="p-4 bg-light rounded-3 border col-9">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col mb-5">
                            <div class="mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn text-white" style="background-color: rgb(26, 24, 156)">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col p-5" style="background-color: rgb(26, 24, 156)">
    </div>
</div>
@endsection
