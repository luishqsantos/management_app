@extends('app.layouts.basic')

@section('title', 'Produto-Detalhes')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes do Produto - {{ isset($product_detail->id) ? 'Editar' : 'Cadastrar' }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div>
                {{ session('message') ? session('message') : '' }}

                @isset($product_detail->id)
                    <h4>Nome: {{$product_detail->product->name}} </h4>
                    <br>
                    <div>Descrição: {{$product_detail->product->description}}</div>
                    <br>
                @endisset
            </div>
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                @component('app.product_detail._components.form_create_edit', [
                    'product_detail' => isset($product_detail->id) ? $product_detail : '',
                    'units' => $units,
                ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
