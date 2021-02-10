@extends('layouts.usern')
@section('title', 'Artikel')
@section('content')
    <header class="ml-5">
        <h2>Artikel</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
        </ol>
    </header>

    <main>
        <div class="content-menu row mx-auto">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card ml-auto mr-auto">
                        <div class="isi-artikel row">
                            <div class="col-sm-3">
                                <img src="images/artikel.jpg" class="card-img" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="post_artikel.html" class="card-title">
                                        <h3>Rebusan Air Daun Dapat Mencegah Kanker</h3>
                                    </a>
                                    <p>
                                        akdjkshflefdkjfslkhdlshdfsliqhdxiknqoqiwhdikhfslfhsfhkslhflhfslfhjfhlskhfskfhdlakshlsd
                                        akdjkshflefdkjfslkhdlshdfsliqhdxiknqoqiwhdikhfslfhsfhkslhflhfslfhjfhlskhfskfhdlakshlsd
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card ml-auto mr-auto">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="images/artikel.jpg" class="card-img" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="post_artikel.html" class="card-title">
                                        <h3>Rebusan Air Daun Dapat Mencegah Kanker</h3>
                                    </a>
                                    <p>akdjkshflefdkjfslkhdlshdfslkhfslfhsfhkslhflhfslfhjfhlskhfskfhdlakshlsd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card ml-auto mr-auto">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="images/artikel.jpg" class="card-img" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="post_artikel.html" class="card-title">
                                        <h3>Rebusan Air Daun Dapat Mencegah Kanker</h3>
                                    </a>
                                    <p>akdjkshflefdkjfslkhdlshdfslkhfslfhsfhkslhflhfslfhjfhlskhfskfhdlakshlsd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card ml-auto mr-auto">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="images/artikel.jpg" class="card-img" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="post_artikel.html" class="card-title">
                                        <h3>Rebusan Air Daun Dapat Mencegah Kanker</h3>
                                    </a>
                                    <p>akdjkshflefdkjfslkhdlshdfslkhfslfhsfhkslhflhfslfhjfhlskhfskfhdlakshlsd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--</div>-->
        </div>
    @endsection

    @push('addon-style')
        <link rel="stylesheet" href="{{ url('frontend/styles/artikel.css') }}" />
    @endpush
