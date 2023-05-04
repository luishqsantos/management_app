@extends('site.layouts.basic')

@section('title', 'Contato')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contact', ['reason' => $reason])
                @endcomponent
            </div>
        </div>
    </div>
   
@endsection