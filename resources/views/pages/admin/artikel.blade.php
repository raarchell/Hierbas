@extends('layouts.admin.admin')
@section('title', 'artikel')
@section('content')
    <div class="container-fluid mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Artikel</li>
            </ol>
          </nav>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Tabel Artikel
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
                                <th>Judul Artikel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Air Rebusan Daun Bisa Cegah Kanker</td>
                                <td class="text-center align-middle">
                                    <form action="#" class="d-inline">
                                        <div class="btn-group">
                                            <button a class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                    <form action="#" method="POST" class="d-inline">
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