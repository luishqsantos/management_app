<form class="mb-3" action="{{ route('product_order.store', ['order' => $order]) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-9 col-xs-7 mb-3">
            <label class="form-label">Produto</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="box" class=""></i></span>
                <select name="product_id" class="form-select form-select-sm" id="select-product">
                    <option>Selecione o Produto</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name . ' - estoque: ' . $product->productStock->quantity}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}
            </div>
        </div>

        <div class="col-lg-3 col-xs-5 mb-3">
            <label class="form-label">Quantidade</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="plus"></i></span>
                <input type="number" class="form-control form-control-sm" name="amount"
                    value="{{ old('amount') ?? '' }}" placeholder="Quantidade" step="1" id="input-amount" >
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('amount') ? $errors->first('amount') : '' }}
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-secondary btn-sm" id="btn-submit">Adicionar</button>
</form>
