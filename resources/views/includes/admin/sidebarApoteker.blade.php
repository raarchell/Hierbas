<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-4" href="{{route('dashboardApoteker')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-home" style="font-size:15px"></i>
                    </div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('Aptabelkategori') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-th-list" style="font-size:15px"></i></div>
                    Kategori Resep
                </a>
                <a class="nav-link" href="{{ route('Aptabelresep') }}">
                    <div class="sb-nav-link-icon"><i class='fas fa-pills'></i></div>
                    Resep Obat
                </a>
                <a class="nav-link" href="{{ route('Aptabeltanaman') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                    Tanaman Herbal
                </a>
            </div>
        </div>
    </nav>
</div>