@extends('layouts.login-regis')
@section('title', 'Login')
@section('content')
    <main>
        <div class="login-card card mx-auto">
            <h3>Hello !</h3>
            <h6><span>Silahkan Masuk</span></h6>

            <form class="form-pesan mx-auto">
                <div class="form-group mt-3">
                    <label>E-mail</label>
                    <input id="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group mt-2">
                    <label>Password</label>
                    <input id="password" type="text" class="form-control" placeholder="Password">
                </div>
            </form>
            <a href="#" class="btn btn-register mx-auto mt-4" style="position: sticky;">
                Login
            </a>
            <a href="register.html" class="register-link"><u>or Create Account</u></a>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/register.css') }}" />
@endpush
