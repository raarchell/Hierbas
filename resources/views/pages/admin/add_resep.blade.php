@extends('layouts.admin.admin')
@section('title', 'add_resep')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tabelresep') }}">Resep</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Tambah Resep Obat Herbal
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="{{ route('storeresep') }}" method="POST" enctype="multipart/form-data" id="get-form-data">
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
                        <p>Judul Resep</p>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Resep">
                    </div>
                    <div class="dropdown ml-3 mt-3">
                        <p>Kategori Penyakit</p>
                        <select name="id_kategori" class="form-control" style="width: 210px">
                            <option selected>Kategori</option>
                            @foreach ($items as $items)
                            <option value="{{ $items->id }}">
                                {{ $items->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div> <br>
                    <div class="form-group">
                        <p>Bahan</p>
                        <textarea name="bahan" id="bahan" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <p>Cara</p>
                        <textarea id="cara" name="cara" rows="4" cols="70"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div> <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('tabelresep') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection