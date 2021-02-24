@extends('layouts.admin.admin')
@section('title', 'edit_datauser')
@section('content')
<div class="container-fluid mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tabeluser') }}">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            Edit Data User
        </div>
        <div class="card-body">
            <div class="main-page">
                <form action="{{ route('updatedatauser', $items->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Nama User</label>
                        <p>{{ $items->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <input id="roles" name="roles" type="text" class="form-control" placeholder="Roles" value="{{ $items->roles }}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        Submit
                    </button>
                    <a href="{{ route('tabeluser') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection