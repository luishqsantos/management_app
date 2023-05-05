<nav class="navbar navbar-expand-lg navbar-dark mb-1" style="background-color: #222e3c;">
    <div class="container-fluid">
        <a class="navbar-brand text-body" href="{{ route('site.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Super Gestão Logo" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.index') ? 'active' : '' }}" href="{{ route('site.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.about') ? 'active' : '' }}" href="{{ route('site.about') }}">Sobre</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.contact') ? 'active' : '' }}" href="{{ route('site.contact') }}">Contato</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.login') ? 'active' : '' }}" href="{{ route('site.login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
