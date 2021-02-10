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
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0812-3456-7890
            </h5>
            <h5 class="mt-5">
                <i class='fas fa-envelope' style='font-size:24px'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; abc@xyz.com
            </h5>
            <h5 class="mt-5">
                <i class='fas fa-map-marker-alt' style='font-size:24px'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jl. xxx Bandung, Jawa Barat
            </h5>
            <div class="sosial-media">
                <a href="#" class="mx-md-2"><i class='fab fa-facebook-square' style='font-size:24px'></i></a>
                <a href="#" class="mx-md-2"><i class='fab fa-twitter' style='font-size:24px'></i></a>
                <a href="#" class="mx-md-2"><i class='fab fa-youtube' style='font-size:24px'></i></a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-form card ml-auto mr-auto">
                <form class="form-pesan">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="nama" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input id="email" type="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Isi Pesan</label>
                        <textarea id="pesan" class="form-control" rows="5"></textarea>
                    </div>
                    <a href="#" class="btn btn-send px-4 mt-4" style="position: sticky;">
                        Send
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/contactus.css') }}" />
@endpush