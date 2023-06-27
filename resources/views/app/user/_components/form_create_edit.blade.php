<form action="{{ isset($client->id) ? route('client.update', $client->id) : route('client.store') }}" method="POST">
    @method(isset($client->id) ? 'PUT' : 'POST')
    @csrf

    @if (session('message'))
        <div class="alert alert-{{ session('color') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="user" class=""></i></span>
            <input type="text" placeholder="Nome" name="name" class="form-control" value="{{ $client->name ?? old('name') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('name') ? $errors->first('name') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="mail" class=""></i></span>
            <input type="text" placeholder="E-mail" name="email" class="form-control" value="{{ $client->email ?? old('email') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="phone" class=""></i></span>
            <input type="tel" placeholder="Telefone" name="telephone" class="form-control phone"  value="{{ $client->telephone ?? old('telephone') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('telephone') ? $errors->first('telephone') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Endereço</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="home" class=""></i></span>
            <input type="text" placeholder="Endereço" name="address" class="form-control"  value="{{ $client->address ?? old('address') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('address') ? $errors->first('address') : '' }}
        </div>
    </div>

    <div class="text-left mt-3">
        <button type="submit" class="btn btn-secondary">{{ isset($client->id) ? 'Salvar' : 'Cadastrar' }}</button>
    </div>
</form>
