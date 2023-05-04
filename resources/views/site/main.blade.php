@extends('site.layouts.basic')

@section('title', 'Home')

@section('content')

    <div class="row gap-2">
        <div class="col-lg-12">
            <div class="p-4 p-md-5 mb-4 rounded text-bg-dark" >
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic text-white">Super Gestão</h1>
                    <p class="lead my-3 text-grey">O Super Gestão é um sistema web altamente eficiente e completo, que tem
                        como
                        objetivo principal o gerenciamento eficaz de estoque, produtos, fornecedores, pedidos e clientes
                        em
                        um ambiente empresarial. Desenvolvido com tecnologias de ponta, este sistema permite que
                        empresas de
                        diferentes portes e segmentos possam gerenciar de forma simples e intuitiva todas as operações
                        relacionadas a estoque, produtos, fornecedores, pedidos e clientes, aumentando a eficiência e a
                        produtividade...</p>
                    <p class="lead mb-0"><a href="{{ route('site.about') }}" class="text-white fw-bold">Continue lendo...</a></p>
                </div>
            </div>


        </div>

        <div class="col-lg-5">
            <div class="card mb-0" style="height: 100%;">
                <div class="card-body">
                    <h1 class="text-body">Sistema Super Gestão</h1>
                    <p class="card-text">Software para gestão empresarial ideal para sua empresa.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <img src="{{ asset('img/check.png') }}">
                            Gestão completa e descomplicada
                        </li>
                        <li>
                            <img src="{{ asset('img/check.png') }}">
                            Sua empresa na nuvem
                        </li>
                    </ul>
                    <img src="{{ asset('img/player_video.jpg') }}" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-0" style="height: 100%;">
                <div class="card-body">
                    <h1 class="text-body">Contato</h1>
                    <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.</p>
                    @component('site.layouts._components.form_contact', ['reason' => $reason])
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card text-center mb-2" style="width: 100%;">
                <i data-feather="clock" class="m-auto mt-3" style="width:60px;height:60px;"></i>
                <div class="card-body">
                    <h1 id="clock" class="card-text text-body"></h1>
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-header">
                    <h1 class="mb-0 text-body">Calendário</h1>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard" class="flatpickr-input" readonly="readonly"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <h1 class="text-center mb-3 text-body">Atividade</h1>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 15rem;">
                <i data-feather="box" class="m-auto mt-3" style="width:60px;height:60px;"></i>
                <div class="card-body">
                    <h3 class="card-text text-body">Estoque</h3>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 15rem;">
                <i data-feather="user-plus" class="m-auto mt-3" style="width:60px;height:60px;"></i>
                <div class="card-body">
                    <h3 class="card-text text-body">Clientes</h3>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 15rem;">
                <i data-feather="shopping-cart" class="m-auto mt-3" style="width:60px;height:60px;"></i>
                <div class="card-body">
                    <h3 class="card-text text-body">Pedidos</h3>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 15rem;">
                <i data-feather="shopping-bag" class="m-auto mt-3" style="width:60px;height:60px;"></i>
                <div class="card-body">
                    <h3 class="card-text text-body">Produtos</h3>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 15rem;">
                <i data-feather="truck" class="m-auto mt-3" style="width:60px;height:60px;"></i>
                <div class="card-body">
                    <h3 class="card-text text-body">Fornecedores</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
