@extends('layouts.user')
@section('title', 'Post Resep')
@section('content')
<!-- header atas -->
<header class="ml-5">
    <h2>Resep</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('resep') }}">Resep</a></li>
        <li class="breadcrumb-item active" aria-current="page">Post</li>
    </ol>
</header>
<main>
    <section class="section-resep">
        <div class="row mx-auto">
            <div class="col-md-7">
                <div class="card-konten card">
                    <div class="card-postawal card-body">
                        <h2 class="card-title">{{ $items->nama }}</h2>
                        <p class="card-text text-muted">Posted {{ $items->created_at }}</p><br>
                        <img class="card-img-top" src="{{ asset('assets/gallery/' . $items->foto) }}">
                        <br><br>
                        <div class="text-post" style="text-align: justify;">
                            <h5>Bahan-Bahan : </h5>
                            <p>{!! $items->bahan !!}</p>
                            <h5>Cara Pembuatan : </h5>
                            <p>{!! $items->cara !!}</p>
                        </div>
                    </div>
                </div>
                <div class="card-konten card my-5">
                    <div class="card-komentar card-body">
                        @auth
                        <form method="POST" action="{{ route('resepcomment') }}">
                            @csrf
                            <div class="komentar form-group">
                                <label for="comment">
                                    <h3>Komentar</h3>
                                </label><br>
                                <textarea id="comment" name="comment" rows="3" placeholder="Tulis komentarmu disini..."></textarea>
                            </div>
                            <input type="hidden" class="form-control" name="id_resep" value="{{ $items->id }}">

                            <input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->id }}">
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                        </form>
                        @endauth
                        @guest
                        <p><a href="{{ route('login') }}">Login</a> untuk komen</p>
                        @endguest
                    </div>
                    <hr>
                    @foreach ($data as $data)
                    <div class="profil-comment">
                        <img src="images/profilkomen.jpg" class="img-komentar rounded-circle float-left" alt="">
                        <div class="comment-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{{ $data->id_user }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $data->comment }}</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="recommend col-md-4">
                <h3>Recommended Post</h3>
                @foreach ($post as $post)
                <div class="content-sidebar mt-4">
                    <div class="card">
                        <div class="isi-recommend row">
                            <div class="col-sm-3">
                                <img src="{{ asset('assets/gallery/' . $post->foto) }}" class="card-img" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="{{route('postresep', $post->id)}}" class="card-title">
                                        <h5>{{ $post->nama }}</h5>
                                    </a>
                                    <p>{!! $post->cara !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/post.css') }}" />
@endpush