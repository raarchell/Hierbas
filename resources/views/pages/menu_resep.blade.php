@extends('layouts.user')
@section('title', 'Menu Resep')
@section('content')
    <header class="ml-5">
        <h2>Resep</h2>
    </header>
    <main>
        <div class="content-menu row mx-auto">
            <div class="col-md-3">
                <div class="card">
                    <img src="images/menu-resep.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <a href="post_resep.html" class="card-title">Ramuan Lemon dan Madu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/menu-resep.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <a href="post_resep.html" class="card-title">Ramuan Lemon dan Madu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/menu-resep.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <a href="post_resep.html" class="card-title">Ramuan Lemon dan Madu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/menu-resep.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <a href="post_resep.html" class="card-title">Ramuan Lemon dan Madu</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/menu-resep-tanaman.css') }}" />
@endpush