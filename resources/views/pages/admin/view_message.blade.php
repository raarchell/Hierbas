@extends('layouts.admin.admin')
@section('title', 'view_message')
@section('content')
    <div class="container-fluid mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Pesan</li>
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
                Tabel Pesan User
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($items as $item)
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->pesan }}</td>
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
