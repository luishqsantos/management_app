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
                                <form action="{{ route('site.login') }}" method="POST">
                                    @if(session('message'))
                                        <div class="alert alert-{{session('color')}}" role="alert">
                                            {{ session('message')}}
                                        </div>
                                    @endif

                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="mail" class=""></i></span>
                                            <input type="text" placeholder="Usuário" name="user" class="form-control"
                                                value="{{ old('user') }}">
                                        </div>
                                        <div class="form-text text-danger">
                                            {{ $errors->has('user') ? $errors->first('user') : '' }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="lock" class=""></i></span>
                                            <input type="password" placeholder="Senha" name="password" class="form-control"
                                                value="{{ old('password') }}">
                                        </div>
                                        <div class="form-text text-danger">
                                            {{ $errors->has('password') ? $errors->first('password') : '' }}
                                        </div>
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Login</button>
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
