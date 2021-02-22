@extends('layouts.admin.admin')
@section('title', 'edit_datauser')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tabeluser') }}">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Edit Data User
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="{{ route('updatedatauser', $items->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label>Nama User</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Nama" value="{{ $items->name }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Pria" {{ $items->jenis_kelamin == 'Pria' ? 'checked' : '' }}>
                            Pria
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Wanita" {{ $items->jenis_kelamin == 'Wanita' ? 'checked' : '' }}>
                            Wanita
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ $items->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ $items->email }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" />
                    </div> <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('tabeluser') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection