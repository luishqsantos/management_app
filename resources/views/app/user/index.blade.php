@extends('app.layouts.basic')

@section('title', 'Usuários')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Usuários</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('register') }}">
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
                    <h5 class="card-title mb-0">Lista de Usuários</h5>
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
                                <th class="d-none d-xl-table-cell">Criação</th>
                                <th class="d-none d-xl-table-cell">Edição</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                    <td class="d-none d-md-table-cell">{{$user->created_at }}</td>
                                    <td class="d-none d-md-table-cell">{{ $user->updated_at }}</td>
                                    <td>
                                        <div class="btn-group dropstart">
                                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('user.edit', $user->id) }}">Editar</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('reset.password', $user->id) }}">Alterar Senha</a></li>
                                                <li class="dropdown-item">
                                                    <form action="{{ route('user.destroy', $user->id) }}"
                                                        method="post" id="form_destroy_{{ $user->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" class="text-black"
                                                            onclick="formSubmit({{ $user->id }})">Excluir</a>
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

                        {{ $users->links('app.layouts._partials.pagination') }}

                        <p>
                            Exibindo {{ $users->count() }} usuário(s) de {{ $users->total() }} (de
                            {{ $users->firstItem() }} a
                            {{ $users->lastItem() }})
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
