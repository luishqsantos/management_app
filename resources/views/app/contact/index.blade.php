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
                    <h5 class="card-title mb-0">Caixa de Mensagens</h5>
                </div>

                @component('app.layouts._partials.search')
                @endcomponent

                <div class="email-app mb-4">
                    <nav>
                        <ul class="nav">
                            <li class="nav-item py-auto">
                                <a class="nav-link d-flex align-items-center {{ (!request()->has('status') || request()->query('status')) ? 'active' : '' }}"
                                    href="{{ route('contact.index', ['status' => 1]) }}"><i
                                        class="bi-envelope-fill text-warning fs-3 me-2"></i> Não Lidas <span
                                        class="badge bg-danger ms-2">{{ $contacts->total() }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center {{ (request()->has('status') && !request()->query('status')) ? 'active' : '' }}"
                                    href="{{ route('contact.index', ['status' => 0]) }}"><i
                                        class="bi-envelope-paper-fill text-warning fs-3 me-2"></i> Lidas<span
                                        class="badge bg-danger ms-2">{{ $contacts->total() }}</span></a>
                            </li>
                        </ul>
                    </nav>

                    @component('app.contact._components.contact_area', [
                        'contacts' => $contacts,
                    ])
                    @endcomponent
                </div>
            </div>
        </div>


    </div>
@endsection
