@extends('layouts.user')
@section('title', 'Contact Us')
@section('content')
<!-- header atas -->
<header class="ml-5">
    <h2>Contact Us</h2>
</header>
<main>
    <div class="content-contact row">
        <div class="contact-alamat col-md-6">
            <h5>
                Jika ada kritik dan saran, silahkan hubungi kami
            </h5>
            <h5 class="alamat-awal mt-5">
                <i class='fas fa-phone' style='font-size:24px'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +6222 20521318
            </h5>
            <h5 class="mt-5">
                <i class='fas fa-envelope' style='font-size:24px'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; info@yakestelkom.or.id
            </h5>
            <h5 class="mt-5">
                <i class='fas fa-map-marker-alt' style='font-size:24px'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jl. Cisanggarung No. 2, Bandung, Jawa Barat 40115
            </h5>
            <div class="sosial-media">
                <a href="#" class="mx-md-2"><i class='fab fa-facebook-square' style='font-size:24px'></i></a>
                <a href="#" class="mx-md-2"><i class='fab fa-twitter' style='font-size:24px'></i></a>
                <a href="#" class="mx-md-2"><i class='fab fa-youtube' style='font-size:24px'></i></a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-form card ml-auto mr-auto">
                <form class="form-pesan" action="{{ route('storepesan') }}" method="POST" enctype="multipart/form-data">
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
                        <label>Nama</label>
                        <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Pesan</label>
                        <textarea id="pesan" name="pesan" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-send px-4 mt-4" name="submit" value="submit">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/contactus.css') }}" />
@endpush