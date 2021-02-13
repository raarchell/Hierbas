@extends('layouts.user')
@section('title', 'Menu Resep')
@section('content')
    <header class="ml-5">
        <h2>Resep</h2>
    </header>
    <main>
        <div class="content-menu row mx-auto">
            @foreach ($items as $item)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('assets/gallery/' . $item->foto) }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <p>
                                <i class='far fa-calendar-alt' style='font-size:15px'></i>&nbsp; {{$item->created_at}}
                            </p>
                            <a href="#" class="card-title">{{$item->nama}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/styles/menu-resep-tanaman.css') }}" />
@endpush
