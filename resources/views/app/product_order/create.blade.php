@extends('app.layouts.basic')

@section('title', 'Produtos/Pedido')

@section('content')

    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Itens do Pedido</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('order.index') }}">
                    Voltar
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table">
            <div class="d-table-cell align-middle">
                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">

                            <div class="container">
                                <h1 class="text-center">Pedido - {{ $order->id }}</h1>
                                <h3 class="text-center">{{ $order->client->name }}</h3>
                            </div>

                            @if (session('message'))
                                <div class="alert alert-{{ session('color') }}" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @component('app.product_order._components.form_create', [
                                'order' => isset($order->id) ? $order : '',
                                'products' => $products,
                            ])
                            @endcomponent
                            <hr>
                            @component('app.product_order._components.product_list', [
                                'order' => isset($order->id) ? $order : '',
                            ])
                            @endcomponent
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
