@php
    function active($route){
        return str_contains(request()->route()->getName(), $route) ? 'active' : '';
    }
@endphp
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle"><img src="{{ asset('img/logo.png') }}" alt="Super Gestão Logo"></span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ active('app.home')}}">
                <a class="sidebar-link" href="{{ route('app.home') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
                </a>
            </li>

            <li class="sidebar-item {{ active('client')}}">
                <a class="sidebar-link" href="{{ route('client.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Cliente</span>
                </a>
            </li>

            <li class="sidebar-item {{ active('order')}}">
                <a class="sidebar-link" href="{{ route('order.index') }}">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Pedido</span>
                </a>
            </li>

            <li class="sidebar-item {{ active('provider')}}">
                <a class="sidebar-link" href="{{ route('provider.index') }}">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Fornecedor</span>
                </a>
            </li>

            <li class="sidebar-item {{ active('product.') }}">
                <a class="sidebar-link" href="{{ route('product.index') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Produto</span>
                </a>
            </li>

            <li class="sidebar-item {{ active('contact') }}">
                <a class="sidebar-link" href="{{ route('contact.index') }}">
                    <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Messagens de Contatos</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

