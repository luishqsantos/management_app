@extends('site.layouts.basic')
@section('title', 'Login')

@section('content')
    <div class="container d-flex flex-column">
        <div class="text-center mt-4">
            <h1 class="h2 text-body">Super Gestão</h1>
            <img src="{{ asset('img/logo.png') }}" alt="Super Gestão Logo">
            <p class="lead mt-3">
                Entre com suas credências para continuar
            </p>
        </div>
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @if ($errors->has('email') || $errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('email') ?? $errors->first('password') }}
                                        </div>
                                    @endif

                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="mail" class=""></i></span>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="lock" class=""></i></span>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Lembrar credenciais') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="d-block mx-auto btn btn-lg btn-primary">Login</button>
                                        @if (Route::has('password.request'))
                                            <a class="d-block btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Esqueceu sua senha?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
