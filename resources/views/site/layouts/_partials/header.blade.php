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
            <div class="navbar-nav">
                <a class="nav-link text-white" href="{{ route('site.index') }}">Home</a>
                <a class="nav-link text-white" href="{{ route('site.about') }}">Sobre</a>
                <a class="nav-link text-white" href="{{ route('site.contact') }}">Contato</a>
                <a class="nav-link text-white" href="{{ route('site.login') }}">Login</a>
            </div>
        </div>
    </div>
</nav>
