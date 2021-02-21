@extends('layouts.admin.admin')
@section('title', 'profil')
@section('content')
    <div class="container-fluid mt-5">
        <header>
            <img src="/assets/avatar/{{ Auth::user()->foto }}" class="rounded-circle float-left" alt=""
                style="object-fit: cover">
            <div class="row">
                <h3>Hai, {{ Auth::user()->name }}</h3>
            </div>
        </header>
    </div>
    <main>
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 1in; margin-bottom: -30px">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="content-profil row">
                <div class="col-sm-3">
                    <h4>Personal Information</h4>
                </div>
                <div class=col-sm-9>
                    <div class="card ml-auto mr-auto">
                        <div class="card-body">
                            <form action="{{ route('profil-update', Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Nama"
                                        value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                            value="Pria" {{ Auth::user()->jenis_kelamin == 'Pria' ? 'checked' : '' }}>
                                        Pria
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                            value="Wanita" {{ Auth::user()->jenis_kelamin == 'Wanita' ? 'checked' : '' }}>
                                        Wanita
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input id="tanggal" type="date" class="form-control" name="tanggal"
                                        value="{{ Auth::user()->tanggal }}">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="E-mail"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" />
                                </div>
                                <button type="submit" class="btn btn-primary mx-auto mt-4" name="submit" value="submit"
                                    style="float:right;">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h4>Update Password</h4>
                </div>
                <div class="col-sm-9">
                    <div class="card ml-auto mr-auto">
                        <div class="card-body">
                            <form action="{{ route('profil-updatePass') }}" method="POST">
                                @method('patch')
                                @csrf
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label for="current_password">{{ __('Current Password') }}</label>
                                    <input id="current_password" type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password" required autocomplete="current_password">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm"> {{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary mx-auto mt-4" name="submit" value="submit"
                                    style="float:right;">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
