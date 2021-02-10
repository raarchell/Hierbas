@extends('layouts.user')
@section('title', 'Post Resep')
@section('content')
<!-- header atas -->
<header class="ml-5">
    <h2>Resep</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="resep.html">Resep</a></li>
        <li class="breadcrumb-item active" aria-current="page">Post</li>
    </ol>
</header>
<main>
    <section class="section-resep">
        <div class="row mx-auto">
            <div class="col-md-7">
                <div class="card-konten card">
                    <div class="card-postawal card-body">
                        <h2 class="card-title">Ramuan 1 (Lemon dan Madu)</h2>
                        <p class="card-text text-muted">Posted 12 Januari 2021</p><br>
                        <img class="card-img-top" src="images/postresep.png">
                        <br><br>
                        <div class="text-post" style="text-align: justify;">
                            <h5>Bahan-Bahan : </h5>
                            <ul style="list-style-type:dist">
                                <li>1/4 Lemon</li>
                                <li>1 Sendok Madu</li>
                                <li>Air Hangat Secukupnya</li>
                            </ul>
                            <h5>Cara Pembuatan : </h5>
                            <ol type="1">
                                <li>Masukkan Madu ke dalam wadah yang telah disediakan</li>
                                <li>Tambahkan air secukupnya sesuai dengan selera</li>
                                <li>Masukkan 1/4 lemon yang telah disiapkan ke dalam wadah</li>
                                <li>Diamkan beberapa saat untuk segera dinikmati</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-konten card my-5">
                    <div class="card-komentar card-body">
                        <form>
                            <div class="komentar form-group">
                                <label for="komentar">
                                    <h3>Komentar</h3>
                                </label><br>
                                <textarea id="komentar" name="komentar" rows="3" placeholder="Tulis komentarmu disini..."></textarea>
                            </div>
                            <div class="form-group float-right">
                                <a href="#" type="submit" class="btn btn-submit">Submit</a>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="profil-comment">
                        <img src="images/profilkomen.jpg" class="img-komentar rounded-circle float-left" alt="">
                        <div class="comment-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Laura</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Baguss banget</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recommend col-md-4">
                <h3>Recommended Post</h3>
                <div class="content-sidebar mt-4">
                    <div class="card">
                        <div class="isi-recommend row">
                            <div class="col-sm-3">
                                <img src="images/tehjahe.png" class="card-img" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="#" class="card-title">
                                        <h5>Teh Jahe</h5>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/post.css') }}" />
@endpush