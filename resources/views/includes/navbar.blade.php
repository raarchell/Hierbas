<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('frontend/images/logo.png') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                @guest
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('login') }}" class="nav-link">Resep</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('login') }}" class="nav-link">Tanaman</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('resep') }}" class="nav-link">Resep</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('tanaman') }}" class="nav-link">Tanaman</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user-alt" style='font-size:17px'></i> &nbsp; {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('profil') }}" class="dropdown-item">Profile</a>
                            <form action="{{ url('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" method="POST">Logout</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-search"></i> Search
                        </a>
                        <div class="dropdown-search dropdown-menu">
                            <form action="{{ route('search') }}" method="GET">
                                @csrf
                                <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                                <input type="submit" value="Go">
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>
