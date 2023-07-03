@extends('app.layouts.basic')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">Cadastrar Usuário</h3>
            </div>
            <div class="col container-fluid text-end">
                <a class="btn btn-primary text-white ms-2" href="{{ route('user.index') }}">
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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Nome') }}</label>

                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="user" class=""></i></span>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" placeholder="Nome"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('E-Mail') }}</label>

                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="mail" class=""></i></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Senha') }}</label>

                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="lock" class=""></i></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Senha">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Confirme a Senha') }}</label>

                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="lock" class=""></i></span>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirme a Senha">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Registrar') }}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
