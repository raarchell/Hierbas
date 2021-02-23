@extends('layouts.admin.admin')
@section('title', 'search')
@section('content')
    <div class="container-fluid mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Search</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <form action="{{ route('searchAdmin') }}" method="GET">
                    <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                    <input type="submit" value="Go">
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nama</th>
                                <th class="text-center align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($resep as $item)
                                    <td>{{ $item->nama }} (Resep)</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('editresep', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('deleteresep', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <div class="btn-group">
                                                <button a class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                            <tr>
                                @foreach ($kategori as $item)
                                    <td>{{ $item->nama }} (Kategori)</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('editkategori', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('deletekategori', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <div class="btn-group">
                                                <button a class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                            <tr>
                                @foreach ($tanaman as $item)
                                    <td>{{ $item->nama }} (Tanaman)</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('edittanaman', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('deletetanaman', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <div class="btn-group">
                                                <button a class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                            <tr>
                                @foreach ($artikel as $item)
                                    <td>{{ $item->judul }} (Artikel)</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('editartikel', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('deleteartikel', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <div class="btn-group">
                                                <button a class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
