@extends('layouts.user')
@section('title', 'Post Artikel')
@section('content')
<!-- header atas -->
<header class="ml-5">
    <h2><b>Artikel</b></h2>
    @auth
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('indexartikel') }}">Artikel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Post</li>
    </ol>
    @endauth
</header>
<main>
    <section class="section-resep">
        <div class="row">
            <div class="col-md-7">
                <div class="card-konten card">
                    <div class="card-postawal card-body">
                        <h2 class="card-title">{{ $items->judul }}</h2>
                        <p class="card-text text-muted">Posted {{ $items->created_at }}</p><br>
                        <img class="card-img-top" src="{{ asset('assets/gallery/' . $items->foto) }}" style="object-fit: contain">
                        <br><br>
                        <div class="text-post" style="text-align: justify;">
                            <p>
                                {!! $items->isi_artikel !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-konten card my-5">
                    <div class="card-komentar card-body">
                        @auth
                        <form method="POST" action="{{ route('artikelcomment') }}">
                            @csrf
                            <div class="komentar form-group">
                                <label for="comment">
                                    <h3>Komentar</h3>
                                </label><br>
                                <textarea id="comment" name="comment" rows="3" placeholder="Tulis komentarmu disini..."></textarea>
                            </div>
                            <input type="hidden" class="form-control" name="id_artikel" value="{{ $items->id }}">

                            <input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->id }}">
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                        </form>
                        @endauth
                        @guest
                        <p><a href="{{ route('login') }}">Login</a> untuk memberikan komentar</p>
                        @endguest
                    </div>
                    <hr>
                    @foreach ($comment as $comment)
                    <div class="profil-comment">
                        <img src="{{ asset('assets/avatar/' . $comment->user->foto) }}" class="img-komentar rounded-circle float-left" alt="" style="object-fit: cover">
                        <div class="comment-body row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>{{$comment->user->name}}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <form action="{{ route('delartikelcomment', $comment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <div class="btn-group">
                                        <button class="btn">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                </div>
            </div>
            @auth
            <div class="recommend col-md-4">
                <h3>Recommended Post</h3>
                @foreach ($post as $post)
                <div class="content-sidebar mt-3">
                    <div class="card">
                        <div class="isi-recommend row">
                            <div class="col-sm-3">
                                <img src="{{ asset('assets/gallery/' . $post->foto) }}" class="card-img" alt="" style="object-fit: cover">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="{{ route('postartikel', $post->id) }}" class="card-title">
                                        <h5>{{ $post->judul }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <h3>Most Read</h3>
                @foreach ($post1 as $post1)
                <div class="content-sidebar mt-3">
                    <div class="card">
                        <div class="isi-recommend row">
                            <div class="col-sm-3">
                                <img src="{{ asset('assets/gallery/' . $post1->foto) }}" class="card-img" alt="" style="object-fit: cover">
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <a href="{{ route('postartikel', $post1->id) }}" class="card-title">
                                        <h5>{{ $post1->judul }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endauth
        </div>
    </section>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/post.css') }}" />
@endpush