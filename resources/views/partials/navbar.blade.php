<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
        </div>
        <div class="navbar-nav">
            @auth
                {{-- If the user is logged in, show their name and a logout button --}}
                <span class="nav-item nav-link">Welcome, {{ Auth::user()->name }}</span>
                <a class="nav-item nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                {{-- If the user is not logged in, show Register and Login links --}}
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
</nav>
