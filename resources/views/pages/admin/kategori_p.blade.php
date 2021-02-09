@extends('layouts.admin.admin')
@section('title', 'kategori_p')
@section('content')
<div class="container-fluid">
    <p class="mt-5">Kategori / Penyakit</p>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Tabel Kategori Penyakit
            <form action="#" class="d-inline">
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
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Flu</td>
                            <td class="text-center align-middle">
                                <form action="{{ route('edit', $item->id) }}" class="d-inline">
                                    <div class="btn-group">
                                        <button a class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                                <form action="{{ route('delete', $item->id) }}" method="POST" class="d-inline">
                                    <div class="btn-group">
                                        <button a class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection