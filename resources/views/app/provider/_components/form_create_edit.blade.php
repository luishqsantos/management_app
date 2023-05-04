<form action="{{ !isset($provider->id) ? route('provider.store') : route('provider.update', $provider->id) }}"
    method="POST">
    @method(isset($provider->id) ? 'PUT' : 'POST')
    @csrf

    @if (session('message'))
        <div class="alert alert-{{ session('color') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <input type="hidden" name="id" value="{{ $provider->id ?? '' }}">

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="user" class=""></i></span>
            <input type="text" placeholder="Nome" name="name" class="form-control" value="{{ $provider->name ?? old('name') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('name') ? $errors->first('name') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Site</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="link" class=""></i></span>
            <input type="text" placeholder="Site" name="site" class="form-control" value="{{ $provider->site ?? old('site') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('site') ? $errors->first('site') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">UF</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="map-pin" class=""></i></span>
            <input type="text" placeholder="UF" name="uf" class="form-control" value="{{ $provider->uf ?? old('uf') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('uf') ? $errors->first('uf') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="mail" class=""></i></span>
            <input type="text" placeholder="E-mail" name="email" class="form-control" value="{{ $provider->email ?? old('email') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>
    </div>

    <button type="submit" class="btn btn-secondary">{{ isset($provider->id) ? 'Salvar' : 'Cadastrar' }}</button>
</form>
