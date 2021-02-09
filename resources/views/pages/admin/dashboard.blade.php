{{-- @extends('layouts.') --}}
@section('title', 'dashboard')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Add</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Tambah nama doi
            </div>
            <div class="card-body">
                <div class="main-page">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="index.html" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
