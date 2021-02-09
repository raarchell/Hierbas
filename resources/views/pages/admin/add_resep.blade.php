@extends('layouts.admin.admin')
@section('title', 'add_resep')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Resep</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Tambah Resep Obat Herbal
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="#" method="POST">
                    <p>Judul Resep</p>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Nama">
                    </div>
                    <p>Kategori Penyakit</p>
                    <div class="dropdown">
                        <select id="inputState" class="form-control">
                            <option selected>Kategori</option>
                            <option>Flu</option>
                            <option>Pegal linu</option>
                        </select>
                    </div> <br>
                    <p>Bahan</p>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bahan" name="bahan"
                            placeholder="Nama">
                    </div>
                    <p>Isi</p>
                    <div class="form-group">
                        <textarea id="isi" name="isi" rows="4" cols="70">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customFile">Foto</label>
                        <input type="file" class="form-control" id="customFile" />
                    </div> <br>
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
