@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Cadastrar Cliente</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('client.index') }}">
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
                            @component('app.client._components.form_create_edit', [
                                'client' => isset($client) ? $client : '',
                            ])
                            @endcomponent
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
