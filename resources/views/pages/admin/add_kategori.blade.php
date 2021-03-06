@extends('layouts.admin.admin')
@section('title', 'add_kategori')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tabelkategori') }}">Kategori Resep</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Tambah Kategori Penyakit
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="{{ route('storekategori') }}" method="POST" enctype="multipart/form-data">
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
                        <p>Nama Kategori Penyakit</p>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kategori Penyakit">
                    </div>
                    <div class="form-group mb-5">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('tabelkategori') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection