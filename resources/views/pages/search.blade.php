@extends('layouts.user')
@section('title', 'Search')
@section('content')
    <header class="ml-5">
        <h2>Search</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search</li>
        </ol>
    </header>
    <main>
        <div class="content-menu row" style="margin-left: 150px">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                <input type="submit" value="Go">
            </form>
        </div>
        <div class="content-menu row mx-auto">
            @foreach ($resep as $item)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ route('postresep', $item->id) }}" class="card-title">{{ $item->nama }}</a>
                        <p>Resep</p>
                    </div>
                </div>
            @endforeach
            @foreach ($kategori as $item)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ route('kat_resep', $item->slug) }}" class="card-title">{{ $item->nama }}</a>
                        <p>Kategori</p>
                    </div>
                </div>
            @endforeach
            @foreach ($tanaman as $item)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ route('posttanaman', $item->id) }}" class="card-title">{{ $item->nama }}</a>
                        <p>Tanaman</p>
                    </div>
                </div>
            @endforeach
            @foreach ($artikel as $item)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ route('postartikel', $item->id) }}" class="card-title">{{ $item->judul }}</a>
                        <p>Artikel</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/kategori.css') }}" />
@endpush
