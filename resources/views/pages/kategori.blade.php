@extends('layouts.user')
@section('title', 'Kategori')
@section('content')
    <header class="ml-5">
        <h2>Kategori</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </header>
    <main>
        <div class="content-menu row mx-auto">
            <div class="col-md-3">
                <div class="card">
                    <a href="#" class="card-title">Pegal Linu</a>
                    <img src="images/kategori-1.png" class="card-img-top" alt="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="#" class="card-title">Pegal Linu</a>
                    <img src="images/kategori-1.png" class="card-img-top" alt="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="#" class="card-title">Pegal Linu</a>
                    <img src="images/kategori-1.png" class="card-img-top" alt="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="#" class="card-title">Pegal Linu</a>
                    <img src="images/kategori-1.png" class="card-img-top" alt="">
                </div>
            </div>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/kategori.css') }}" />
@endpush
