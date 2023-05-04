@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Cadastrar Pedido</h3>
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
                            @component('app.order._components.form_create_edit', [
                                'order' => isset($order->id) ? $order : '',
                                'clients' => $clients,
                            ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
