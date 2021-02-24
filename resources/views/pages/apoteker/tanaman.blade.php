@extends('layouts.admin.apoteker')
@section('title', 'tanaman')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Aptabeltanaman') }}">Tanaman Herbal</a></li>
        </ol>
    </nav>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Tabel Tanaman Herbal
            <form action="{{ route('Apaddtanaman') }}" class="d-inline">
                <div class="float-right">
                    <button a class="btn btn-primary">+ Add</button>
                </div>
            </form>
            <form action="{{ route('Apsearchtanaman') }}" method="GET" class="mt-4">
                <input type="text" name="cari" placeholder="Search 'tanaman'" value="{{ old('cari') }}">
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Tanaman</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($items as $item)
                            <td>{{ $item->nama }}</td>
                            <td class="text-center align-middle">
                                <form action="{{ route('Apedittanaman', $item->id) }}" class="d-inline">
                                    <div class="btn-group">
                                        <button a class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                                <form action="{{ route('Apdelete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
        <div class="container" style="margin-left: 10px">
            Halaman : {{ $items->currentPage() }} <br />
            Jumlah Data : {{ $items->total() }} <br />
            Data Per Halaman : {{ $items->perPage() }} <br />
            <br>
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection