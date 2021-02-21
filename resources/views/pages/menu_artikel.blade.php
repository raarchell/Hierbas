@extends('layouts.usern')
@section('title', 'Artikel')
@section('content')
<header class="ml-5">
    <h2>Artikel</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Artikel</li>
    </ol>
</header>

<main>
    <div class="content-menu row mx-auto">
        <div class="row">
            @foreach ($items as $item)
            <div class="col-sm-6">
                <div class="card ml-auto mr-auto">
                    <div class="isi-artikel row">
                        <div class="col-sm-3">
                            <img src="{{ asset('assets/gallery/' . $item->foto) }}" class="card-img" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body">
                                <a href="{{ route('postartikel', $item->id) }}" class="card-title">
                                    <h3>{{ $item->judul }}</h3>
                                </a>
                                {!! $item->isi_artikel !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/artikel.css') }}" />
@endpush