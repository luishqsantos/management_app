<form action="{{ isset($product_detail->id) ? route('product-detail.update', $product_detail->id) : route('product-detail.store') }}"
    method="POST">
    @method(isset($product_detail->id) ? 'PUT' : 'POST')
    @csrf
    <input type="hidden" name="id" value="{{ $product_detail->id ?? '' }}">

    <input type="text" placeholder="Id do Produto" name="product_id" class="borda-preta" value="{{ $product_detail->product_id ?? old('product_id') }}">
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}
    <br>

    <input type="text" placeholder="Comprimento" name="lenght" class="borda-preta" value="{{ $product_detail->lenght ?? old('lenght') }}">
    {{ $errors->has('lenght') ? $errors->first('lenght') : '' }}
    <br>

    <input type="text" placeholder="Altura" name="height" class="borda-preta" value="{{ $product_detail->height ?? old('height') }}">
    {{ $errors->has('height') ? $errors->first('height') : '' }}
    <br>

    <input type="text" placeholder="Largura" name="width" class="borda-preta" value="{{ $product_detail->width ?? old('width') }}">
    {{ $errors->has('width') ? $errors->first('width') : '' }}
    <br>

    <select name="unity_id">
        <option>Selecione a unidade de medida</option>
        @foreach ($units as $unity)
            <option value="{{ $unity->id }}"
                {{ ($product_detail->unity_id ?? old('unity_id')) == $unity->id ? 'selected' : '' }}>{{ $unity->description }}
            </option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="borda-preta">{{ isset($product_detail->id) ? 'Salvar' : 'Cadastrar' }}</button>
</form>