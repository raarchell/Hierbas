@extends('layouts.admin.admin')
@section('title', 'edit_tanaman')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
<<<<<<< HEAD
            <li class="breadcrumb-item"><a href="{{ route('tabeltanaman') }}">Tanaman Herbal</a></li>
=======
            <li class="breadcrumb-item"><a href="{{ ('tabeltanaman') }}">Tanaman Herbal</a></li>
>>>>>>> d256c3b4445ac650eddd3a313bec2047ab2a86eb
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Edit Jenis Tanaman
        </div>
        <div class="card-body">
            <div class="main-page">
<<<<<<< HEAD
                <form action="{{ route('update' , $items->id) }}" method="POST">
=======
                <form action="{{ route('update', $items->id) }}" method="POST">
>>>>>>> d256c3b4445ac650eddd3a313bec2047ab2a86eb
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
<<<<<<< HEAD
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Artikel" value="{{ $items->nama }}">
                    </div>
                    <div class="form-group">
                        <p>Pengertian & Cara Menanam</p>
                        <textarea id="isi" name="isi" rows="4" cols="70">{{ $items->isi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div>
                    <div class="form-group">
                        <p>Link Youtube</p>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Link Youtube" value="{{ $items->link }}">
=======
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Tanaman" value="{{ $items->nama }}" />
                    </div>
                    <div class="form-group">
                        <p>Pengertian</p>
                        <textarea id="pengertian" name="pengertian" rows="4" cols="70">{{ $items->pengertian }}</textarea>
                    </div>
                    <div class="form-group">
                        <p>Cara Menanam</p>
                        <textarea id="cara_menanam" name="cara_menanam" rows="4" cols="70">{{ $items->cara_menanam }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div>
                    <div class="form-group">
                        <p> Link Video Youtube </p>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Link Youtube">
>>>>>>> d256c3b4445ac650eddd3a313bec2047ab2a86eb
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('tabeltanaman') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection