<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                    data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('img/user.png') }}" class="avatar img-fluid rounded me-1"
                        alt="usuário logo" />
                    <span class="text-dark">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end mx-4">
                    <a class="dropdown-item" href="{{route('user.edit', Auth::user()->id)}}"><i class="align-middle me-1"
                            data-feather="user"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" type="submit">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="border-0 bg-transparent" type="submit">Sair</button>
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
