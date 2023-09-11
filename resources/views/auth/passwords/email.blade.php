@extends(auth()->check() ? 'app.layouts.basic' : 'site.layouts.basic')

@section('title', 'Redefinição de Senha')

@section('content')
    <div class=" container-fluid mb-3">
        <div class="row">
            <div class="col justify-content-start">
                <h3 class="text-align-middle my-1">{{ __('Redefinição de Senha') }}</h3>
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

                        @isset($name)
                            <h2 class="text-center">{{$name}}</h2>
                        @endisset

                        <div class="m-sm-4">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                @if (session('message'))
                                    <div class="alert alert-{{ session('color') }}" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('E-Mail') }}</label>

                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="mail" class=""></i></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                            {{ isset($email) ? 'readonly' : '' }}>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Enviar Link') }}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
