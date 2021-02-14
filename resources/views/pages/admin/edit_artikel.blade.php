@extends('layouts.admin.admin')
@section('title', 'edit_artikel')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tabelartikel') }}">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Edit Artikel
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="{{ route('update', $items->id) }}" method="POST">
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
                        <p>Judul Artikel</p>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" value="{{ $items->judul }}" />
                    </div>
                    <div class=" form-group">
                        <p>Isi</p>
                        <textarea id="isi_artikel" name="isi_artikel" rows="4" cols="70"> {{ $items->isi_artikel }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div> <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('tabelartikel') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection