<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
        <a href="#" class="navbar-brand">
            <img src="{{ url('frontend/images/logo.png') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="resep.html" class="nav-link">Resep</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="tanaman.html" class="nav-link">Tanaman</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user-alt" style='font-size:17px'></i> &nbsp; {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="profil.html" class="dropdown-item">Profile</a>
                            <form action="{{ url('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" method="POST">Logout</button>
                            </form>
                        </div>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbardrop" data-toggle="dropdown">
                        <i class="fa fa-search"></i>
                    </a>
                    <div class="dropdown-search dropdown-menu">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
