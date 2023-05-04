@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Fornecedores</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('provider.create') }}">
                    Novo
                </a>
            </div>
        </div>
    </div>
    <div class="row">

        @if (session('message'))
            <div class="alert alert-{{ session('color') }}" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lista de Fornecedores</h5>
                </div>

                @include('app.layouts._partials.search')

                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th class="d-none d-md-table-cell">Site</th>
                                <th class="d-none d-xl-table-cell">UF</th>
                                <th class="d-none d-xl-table-cell">E-mail</th>
                                <th class="d-none d-xl-table-cell">Produtos</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $provider->site }}</td>
                                    <td class="d-none d-md-table-cell">{{ $provider->uf }}</td>
                                    <td class="d-none d-md-table-cell">{{ $provider->email }}</td>
                                    <td class="d-none d-md-table-cell">{{ $provider->products->count() }}</td>
                                    <td>
                                        <div class="btn-group dropstart">
                                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('provider.show', $provider->id) }}">Visualizar
                                                        Produtos</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('provider.edit', $provider->id) }}">Editar</a></li>
                                                <li class="dropdown-item">
                                                    <form action="{{ route('provider.destroy', $provider->id) }}"
                                                        method="post" id="form_destroy_{{ $provider->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" class="text-black"
                                                            onclick="formSubmit({{ $provider->id }})">Excluir</a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="container-fluid text-center mt-3">

                        {{ $providers->appends($request)->links('app.layouts._partials.pagination') }}

                        <p>
                            Exibindo {{ $providers->count() }} produto(s) de {{ $providers->total() }} (de
                            {{ $providers->firstItem() }} a
                            {{ $providers->lastItem() }})
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
