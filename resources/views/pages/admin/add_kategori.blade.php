@extends('layouts.admin.admin')
@section('title', 'add_kategori')
@section('content')
<div class="container-fluid">
    <p class="mt-5">Kategori / Penyakit / Add</p>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Tambah Kategori Penyakit
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="#" method="POST">
                    <p>Nama Kategori Penyakit</p>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="#" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection