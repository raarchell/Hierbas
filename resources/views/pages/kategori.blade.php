@extends('layouts.user')
@section('title', 'Kategori')
@section('content')
    <header class="ml-5">
        <h2>Kategori</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </header>
    <main>
        <div class="content-menu row mx-auto">
            @foreach ($items as $item)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ route('kat_resep', $item->slug)}}" class="card-title">{{ $item->nama }}</a>
                        <img src="{{ asset('assets/gallery/' . $item->foto) }}" class="card-img-top" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/kategori.css') }}" />
@endpush
