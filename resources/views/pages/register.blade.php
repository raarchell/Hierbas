@extends('layouts.login-regis')
@section('title', 'Register')
@section('content')
    <main>
        <div class="register-card card mx-auto">
            <h3>Selamat Datang !</h3>
            <form class="form-pesan">
                <div class="content-register row mt-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input id="nama" type="text" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input id="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        {{-- <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input id="tanggal" type="date" class="form-control">
                        </div> --}}
                    </div>
                    <div class="col-md-6">
                        {{-- <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Wanita</label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
            </form>
            <a href="#" class="btn btn-register mx-auto mt-4" style="position: sticky;">
                Register
            </a>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/register.css') }}" />
@endpush
