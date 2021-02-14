@extends('layouts.userf')
@section('title', 'Home')
@section('content')
<!-- header atas -->
<header class="text-center my-auto">
    <h1>
        Health is Wholeness
    </h1>
    <p class="mt-3">
        Let us helps your health
    </p>
    @guest
    <a href="{{ route('login') }}" class="btn btn-login px-4 mt-4" style="position: sticky;">
        Login
    </a>
    @endguest
</header>
<main>
    <section class="section-awal" id="awal">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mt-5">
                    <img src="images/awal.png" alt="">
                </div>
                <div class="col-md-6 mt-5">
                    <h3>Mengapa harus obat herbal?</h3>
                    <p>
                        <br>
                        Obat herbal merupakan salah satu opsi dalam pengobatan dan menjaga kesehatan tubuh untuk
                        mencegah berbagai macam penyakit.
                        Penggunaan obat herbal dinilai lebih bagus karena bahan-bahan yang digunakan merupakan bahan
                        alami.
                        Bahan alami yang dijadikan obat herbal memang aman untuk dikonsumsi karena efek samping yang
                        minimum.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="section-slogan row" id="stats">
            <div class="col-md-4 slogan-detail">
                <i class="fas fa-check"></i>&nbsp; Aman
            </div>
            <div class="col-md-4 slogan-detail">
                <i class='fas fa-plus' style='font-size:24px'></i>&nbsp; Sehat
            </div>
            <div class="col-md-4 slogan-detail">
                <i class='fas fa-heart' style='font-size:24px'></i>&nbsp; Berkhasiat
            </div>
        </section>
    </div>
    <section class="section-kategori mt-5" id="penyakit">
        <div class="container">
            <div class="row">
                <div class="col section-kategori-heading">
                    <h3>Kategori Resep</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="section-kategori-content" id="kategoriContent">
        <div class="container">
            <div class="section-kategori-penyakit row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-kategori text-center d-flex flex-column" style="background-image: url('images/penyakit1.png');">
                        <div class="penyakit-nama">
                            <a href="#" class="">
                                Sakit Kepala
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-kategori text-center d-flex flex-column" style="background-image: url('images/penyakit2.png');">
                        <div class="penyakit-nama">
                            <a href="#" class="">
                                Pegal Linu
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-kategori text-center d-flex flex-column" style="background-image: url('images/penyakit1.png');">
                        <div class="penyakit-nama">
                            <a href="#" class="">
                                Flu
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-kategori text-center d-flex flex-column" style="background-image: url('images/penyakit1.png');">
                        <div class="penyakit-nama">
                            <a href="#" class="">
                                Menjaga Imun
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="see-more row mt-3">
                <a href="{{ route('kategori') }}">See More</a>
            </div>
        </div>
    </section>
    <section class="section-artikel" id="artikel">
        <div class="container">
            <div class="row">
                <h3>Artikel Terkini</h3>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <img src="images/artikel1.png" alt="">
                </div>
                <div class="isi-artikel col-md-2">
                    <h4>Judul</h4>
                    <p>
                        pspoiwqnxkxmlw
                        <br>
                        qeoqiehdkankxsp
                        <br>
                        pspoiwqnxkxmlw
                        <br>
                        qeoqiehdkankxsp
                    </p>
                </div>
                <div class="col-md-2">
                    <img src="images/artikel2.png" alt="">
                </div>
                <div class="isi-artikel col-md-2">
                    <h4>Judul</h4>
                    <p>
                        pspoiwqnxkxmlw
                        <br>
                        qeoqiehdkankxsp
                        <br>
                        pspoiwqnxkxmlw
                        <br>
                        qeoqiehdkankxsp
                    </p>
                </div>
                <div class="col-md-2">
                    <img src="images/artikel3.png" alt="">
                </div>
                <div class="isi-artikel col-md-2">
                    <h4>Judul</h4>
                    <p>
                        pspoiwqnxkxmlw
                        <br>
                        qeoqiehdkankxsp
                        <br>
                        pspoiwqnxkxmlw
                        <br>
                        qeoqiehdkankxsp
                    </p>
                </div>
            </div>
            <div class="see-more row mt-2">
                <a href="{{ route('indexartikel') }}">See More</a>
            </div>
        </div>
    </section>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/main.css') }}" />
@endpush