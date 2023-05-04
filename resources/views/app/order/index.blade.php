@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')




    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Pedidos</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('order.create') }}">
                    Novo
                </a>
            </div>
        </div>
    </div>
    <div class="row pb-3">

        @if (session('message'))
            <div class="alert alert-{{ session('color') }}" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lista de Pedidos</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cliente</th>
                                <th>Itens</th>
                                <th>Valor/Pedido</th>
                                <th class="d-none d-md-table-cell">Data/Hora</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->client->name }}</td>
                                    <td>{{ $order->products->count() }}</td>
                                    <td> R$ {{ number_format($order->products->sum('pivot.total'), '2', ',', '.') }}
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $order->created_at->format('d M Y H:i:s') }}</td>
                                    <td>
                                        <div class="btn-group dropstart">
                                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('product_order.create', $order->id) }}">Visualizar
                                                        Pedido</a></li>
                                                <li class="dropdown-item">
                                                    <form action="{{ route('order.destroy', $order->id) }}" method="post"
                                                        id="form_destroy_{{ $order->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" class="text-black"
                                                            onclick="formSubmit({{ $order->id }})">Excluir</a>
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

                        {{ $orders->appends($request)->links('app.layouts._partials.pagination') }}

                        <p>
                            Exibindo {{ $orders->count() }} pedido(s) de {{ $orders->total() }} (de
                            {{ $orders->firstItem() }} a
                            {{ $orders->lastItem() }})
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
