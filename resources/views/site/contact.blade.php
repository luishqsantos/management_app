@extends('site.layouts.basic')

@section('title', 'Contato')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h1 class="text-align-middle my-1">Entre em contato conosco</h1>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('site.index') }}">
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
                            @component('site.layouts._components.form_contact', ['reason' => $reason])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
