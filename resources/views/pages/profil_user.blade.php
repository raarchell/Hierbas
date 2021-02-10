@extends('layouts.user')
@section('title', 'Profil')
@section('content')
<!--Header-->
<header>
    <img src="images/profilkomen.jpg" class="rounded-circle float-left" alt="">
    <div class="row">
        <h3>Hai, Nama</h3>
    </div>
</header>
<main>
    <div class="content-profil row">
        <div class="col-sm-3">
            <h4>Personal Information</h4>
        </div>
        <div class=col-sm-9>
            <div class="card ml-auto mr-auto">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <label>Nama</label>
                            <input id="nama" type="text" class="form-control" placeholder="Nama">
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
                            <input id="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                    </div>
                    <a href="#" class="btn btn-profil mx-auto mt-4" style="float: right;">
                        Save
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <h4>Update Password</h4>
        </div>
        <div class="col-sm-9">
            <div class="card ml-auto mr-auto">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input id="password" type="password" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <a href="#" class="btn btn-profil mx-auto mt-4" style="float: right;">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/profil.css') }}" />
@endpush