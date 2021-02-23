@extends('layouts.admin.admin')
@section('title', 'user')
@section('content')
<div class="container-fluid mt-5">
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </nav>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Tabel Data User
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($items as $item)
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td class="text-center align-middle">
                                <form action="{{ route('editdatauser', $item->id) }}" class="d-inline">
                                    @csrf
                                    <div class="btn-group">
                                        <button a class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                                <form action="{{ route('deleteuser', $item->id) }}" method="POST" class="d-inline">
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