@extends('layouts.admin.apoteker')
@section('title', 'dashboard')
@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Welcome, {{ Auth::user()->name }} !</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <h1>{{ $jmlkat }}</h1>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">Total Kategori Resep</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <h1>{{ $jmlrsp }}</h1>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">Total Resep Obat</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <h1>{{ $jmltnm }}</h1>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">Total Tanaman</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection