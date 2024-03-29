@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Clientes</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('client.create') }}">
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
                    <h5 class="card-title mb-0">Lista de Clientes</h5>
                </div>

                @component('app.layouts._partials.search')
                @endcomponent
                
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th class="d-none d-md-table-cell">Email</th>
                                <th class="d-none d-xl-table-cell">Telefone</th>
                                <th class="d-none d-xl-table-cell">Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $client->email }}</td>
                                    <td class="d-none d-md-table-cell">{{ $client->telephone }}</td>
                                    <td class="d-none d-md-table-cell">{{ $client->address }}</td>
                                    <td>
                                        <div class="btn-group dropstart">
                                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" id="client_show_{{ $client->id }}"
                                                        data-value="{{ route('client.show', $client->id) }}"
                                                        onclick="clientShow({{ $client->id }})">Visualizar</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('client.edit', $client->id) }}">Editar</a></li>
                                                <li class="dropdown-item">
                                                    <form action="{{ route('client.destroy', $client->id) }}"
                                                        method="post" id="form_destroy_{{ $client->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" class="text-black"
                                                            onclick="formSubmit({{ $client->id }})">Excluir</a>
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

                        {{ $clients->links('app.layouts._partials.pagination') }}

                        <p>
                            Exibindo {{ $clients->count() }} cliente(s) de {{ $clients->total() }} (de
                            {{ $clients->firstItem() }} a
                            {{ $clients->lastItem() }})
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
