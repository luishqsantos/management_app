@extends('app.layouts.basic')

@section('title', 'Contato')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Mensagens de Contatos</h3>
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
                    <h5 class="card-title mb-0">Lista de Mensagens</h5>
                </div>

                @component('app.layouts._partials.search')
                @endcomponent

                {{-- @component('app.contact._components.contact_table', [
                    'contacts' => $contacts
                ])
                @endcomponent --}}

                @component('app.contact._components.contact_area', [
                    'contacts' => $contacts
                ])
                @endcomponent
            </div>
        </div>


    </div>
@endsection