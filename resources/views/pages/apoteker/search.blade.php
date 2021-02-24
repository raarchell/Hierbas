@extends('layouts.admin.apoteker')
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
                <form action="{{ route('searchApoteker') }}" method="GET">
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
                                        <form action="{{ route('Apeditresep', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('Apdeleteresep', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')" >
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
                                        <form action="{{ route('Apeditkategori', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('Apdeletekategori', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')" >
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
                                        <form action="{{ route('Apedittanaman', $item->id) }}" class="d-inline">
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('Apdelete', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')" >
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
