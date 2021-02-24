@extends('layouts.admin.apoteker')
@section('title', 'edit tanaman')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Aptabeltanaman') }}">Tanaman Herbal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Edit Jenis Tanaman
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="{{ route('Apupdatetanaman' , $items->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <p>Nama Tanaman</p>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Artikel" value="{{ $items->nama }}">
                    </div>
                    <div class="form-group">
                        <p>Deskripsi & Cara Menanam</p>
                        <textarea id="isi" name="isi" rows="4" cols="70">{{ $items->isi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div>
                    <div class="form-group">
                        <p>Link Youtube</p>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Link Youtube" value="{{ $items->link }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="video">Video</label>
                        <input type="file" class="form-control" id="video" name="video" />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('Aptabeltanaman') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection