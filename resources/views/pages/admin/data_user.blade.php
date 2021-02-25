@extends('layouts.admin.admin')
@section('title', 'user')
@section('content')
    <div class="container-fluid mt-5">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('tabeluser') }}">Data User</a>
                </li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Tabel Data User
                <form action="{{ route('searchUser') }}" method="GET" class="mt-4">
                    <input type="text" name="cari" placeholder="Search nama user" value="{{ old('cari') }}">
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th class="text-center align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($items as $item)
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->roles }}</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('editdatauser', $item->id) }}" class="d-inline">
                                            @csrf
                                            <div class="btn-group">
                                                <button a class="btn btn-primary">Edit Roles</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('deleteuser', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
