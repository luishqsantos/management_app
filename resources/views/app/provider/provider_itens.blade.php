@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Produtos do Fornecedor - <strong>{{ $provider->name }}</strong></h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('provider.index') }}">
                    Voltar
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lista de Produtos</h5>
                </div>


                @component('app.layouts._partials.search', ['route' => route('provider.show', $provider->id)])
                @endcomponent

                @component('app.product._components.product_table', [
                    'products' => $products,
                ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
