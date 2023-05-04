@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Produtos</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('product.create') }}">
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
                    <h5 class="card-title mb-0">Lista de Produtos</h5>
                </div>

                @component('app.layouts._partials.search')
                @endcomponent

                @component('app.product._components.product_table', [
                    'products' => $products,
                ])
                @endcomponent
            </div>
        </div>


    </div>
@endsection
