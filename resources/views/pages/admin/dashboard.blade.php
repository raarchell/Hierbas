@extends('layouts.admin.admin')
@section('title', 'dashboard')
@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Welcome, Admin!</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-xl-3 col-md-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <h1>12</h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">Total Resep Obat</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <h1>16</h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">Total Tanaman</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card text-white bg-info mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <h1>10</h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">Total Artikel</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">
                        <div class="text-center">Kategori</div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h1>13</h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">Total Penyakit</div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <div class="text-center">Kategori</div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h1>11</h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">Total Khasiat</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
