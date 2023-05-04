<form action="{{ route('site.contact') }}" method="POST">

    @if (session('message'))
        <div class="alert alert-{{session('color')}}" role="alert">
            {{ session('message') }}
        </div>
    @endif


    @csrf
    <input type="hidden" name="redirectRouteName" value="{{Route::currentRouteName()}}">

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Seu nome</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        <div class="form-text text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Telefone</label>
        <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
        <div class="form-text text-danger">{{ $errors->has('telephone') ? $errors->first('telephone') : '' }}</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
        <div class="form-text text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Motivo do contato</label>
        <select name="reason_id" class="form-control" required>
            <option value=""></option>
            @foreach ($reason as $key => $value)
                <option value="{{ $value->id }}" {{ old('reason_id') == $value->id ? 'selected' : '' }}>
                    {{ $value->reason }}</option>
            @endforeach
        </select>
        <div class="form-text text-danger">{{ $errors->has('reason_id') ? $errors->first('reason_id') : '' }}</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Sua mensagem</label>
        <textarea name="message" class="form-control" rows="3" required>{{ !empty(old('message')) ? old('message') : '' }}</textarea>
        <div class="form-text text-danger">{{ $errors->has('message') ? $errors->first('message') : '' }}</div>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
