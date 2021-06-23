@extends('layouts.login-regis')
@section('title', 'Login')

@section('content')
    <main>
        <div class="login-card card mx-auto">
            <h3>Hello !</h3>
            <h6><span>Silahkan Masuk</span></h6>

            <form action="{{ route('login') }}" class="form-pesan mx-auto" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label>E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif --}}
                </div>
                {{-- <div class="form-remember">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-register mx-auto mt-4">
                        Login
                    </button>
                </div>
            </form>
            <a href="{{ route('register') }}" class="register-link"><u>or Create Account</u></a>
        </div>
    </main>
@endsection
@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/register.css') }}" />
@endpush
