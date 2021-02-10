@extends('layouts.user')
@section('title', 'Menu Tanaman')
@section('content')
    <header class="ml-5">
        <h2>Tanaman</h2>
    </header>
    <main>
        <div class="content-menu row mx-auto">
            <div class="col-md-3">
                <div class="card">
                    <img src="images/jahe.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <h5 class="card-title">Jahe</h5>
                        <p class="card-text text-justify">Jahe (Zingiber officinale), adalah tanaman rimpang yang sangat
                            populer sebagai rempah-rempah dan bahan obat.</p>
                        <div class="text-center">
                            <a href="post_tanaman.html" class="btn btn-details">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/jahe.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <h5 class="card-title">Jahe</h5>
                        <p class="card-text text-justify">Jahe (Zingiber officinale), adalah tanaman rimpang yang sangat
                            populer sebagai rempah-rempah dan bahan obat.</p>
                        <div class="text-center">
                            <a href="post_tanaman.html" class="btn btn-details">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/jahe.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <h5 class="card-title">Jahe</h5>
                        <p class="card-text text-justify">Jahe (Zingiber officinale), adalah tanaman rimpang yang sangat
                            populer sebagai rempah-rempah dan bahan obat.</p>
                        <div class="text-center">
                            <a href="post_tanaman.html" class="btn btn-details">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/jahe.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <p>
                            <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; 2 Februari 2021
                        </p>
                        <h5 class="card-title">Jahe</h5>
                        <p class="card-text text-justify">Jahe (Zingiber officinale), adalah tanaman rimpang yang sangat
                            populer sebagai rempah-rempah dan bahan obat.</p>
                        <div class="text-center">
                            <a href="post_tanaman.html" class="btn btn-details">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/menu-resep-tanaman.css') }}" />
@endpush