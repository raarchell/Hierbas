<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Dashboard</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form action="{{ route('searchAdmin') }}" method="GET" class=" d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profiladmin') }}">Profile</a>
                <div class="dropdown-divider"></div>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" method="POST">Logout</button>
                </form>
            </div>
        </li>
    </ul>
</nav>