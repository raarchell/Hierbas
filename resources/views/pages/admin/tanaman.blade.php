@extends('layouts.admin.admin')
@section('title', 'tanaman')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Tanaman Herbal</li>
        </ol>
    </nav>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Tabel Artikel
            <form action="{{ route('addtanaman') }}" class="d-inline">
                <div class="float-right">
                    <button a class="btn btn-primary">+ Add</button>
                </div>
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
                                <form action="{{ route('edittanaman', $item->id) }}" class="d-inline">
                                    @csrf
                                    <div class="btn-group">
                                        <button a class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                                <form action="{{ route('delete', $item->id) }}" method="POST" class="d-inline">
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