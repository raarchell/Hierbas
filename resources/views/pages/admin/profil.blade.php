@extends('layouts.admin.admin')
@section('title', 'profil')
@section('content')
<div class="container-fluid mt-5">
    <header>
        <img src="hierba-admin/assets/img/profil.jpg" class="rounded-circle float-left" alt="">
        <div class="row">
            <h3>Hai, Nama</h3>
        </div>
    </header>
</div>
<main>
    <div class="container-fluid">
        <div class="content-profil row">
            <div class="col-sm-3">
                <h4>Personal Information</h4>
            </div>
            <div class=col-sm-9>
                <div class="card ml-auto mr-auto">
                    <div class="card-body">
                        <div class="form" action="{{ route('profil-update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nama" value=" {{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input id="tanggal" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input id="email" type="email" class="form-control" placeholder="E-mail" value="{{ $user->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto mt-4" name="submit" value="submit" style="float:right;">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h4>Update Password</h4>
            </div>
            <div class="col-sm-9">
                <div class="card ml-auto mr-auto">
                    <div class="card-body">
                        <div class="form" action="{{ route('profil-update') }}" method="POST">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input id="password" type="password" class="form-control" placeholder="Current Password" value="{{ $user->password }}">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input id="password" type="password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password" type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto mt-4" name="submit" value="submit" style="float:right;">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection