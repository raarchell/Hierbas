<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-4" href="index.html">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-home" style="font-size:15px"></i>
                    </div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('tabelkategori') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-th-list" style="font-size:15px"></i></div>
                    Kategori Resep
                </a>
                <a class="nav-link" href="{{ route('tabelresep') }}">
                    <div class="sb-nav-link-icon"><i class='fas fa-pills'></i></div>
                    Resep Obat
                </a>
                <a class="nav-link" href="{{ route('tabeltanaman') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                    Tanaman Herbal
                </a>
                <a class="nav-link" href="{{ route('tabelartikel') }}">
                    <div class="sb-nav-link-icon"><i class='fas fa-file-alt'></i></i></div>
                    Artikel
                </a>
                <a class="nav-link" href="{{ route('contactus') }}">
                    <div class="sb-nav-link-icon"><i class='fas fa-envelope'></i></div>
                    Pesan
                </a>
            </div>
        </div>
    </nav>
</div>