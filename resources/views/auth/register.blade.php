@extends('layouts.login-regis')
@section('title', 'Register')
@section('content')
    <main>
        <div class="register-card card mx-auto">
            <h3>Selamat Datang !</h3>
            <form class="form-pesan" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="content-register row mt-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="Nama" value="{{ old('name') }}" required autocomplete="name"
                                autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="E-mail" value="{{ old('email') }}" required
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-register mx-auto mt-4">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/register.css') }}" />
@endpush
