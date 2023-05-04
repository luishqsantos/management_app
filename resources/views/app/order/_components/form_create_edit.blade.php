<form action="{{ isset($order->id) ? route('order.update', $order->id) : route('order.store') }}" method="POST">
    @method(isset($order->id) ? 'PUT' : 'POST')
    @csrf

    <input type="hidden" name="id" value="{{ $order->id ?? '' }}">

    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="user" class=""></i></span>
            <select name="client_id" class="form-control">
                <option>Selecione o cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}"
                        {{ ($order->client_id ?? old('client_id')) == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-text text-danger">
             {{ $errors->has('client_id') ? $errors->first('client_id') : '' }}
        </div>
    </div>

    <button type="submit" class="btn btn-secondary">Cadastrar</button>
</form>
