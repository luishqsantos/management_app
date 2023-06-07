<div class="containet text-center mb-3">
    <div class="text-center container-fluid mb-3">
        {{-- Preview da imagem Carregada do banco de dados --}}
        @isset($product->productDetail->image)
            <img src="{{ asset('/storage/' . $product->productDetail->image) }}" id="image-product" class="rounded"
                alt="Imagem do Produto">
        @endisset

        {{-- Preview da imagem Carregada para recorte --}}
        <img id="image-preview" class="rounded" alt="Imagem do Produto">
    </div>
    <button id="crop-btn" class="btn btn-secondary mx-auto">Recortar</button>
</div>

<form action="{{ isset($product->id) ? route('product.update', $product->id) : route('product.store') }}" method="POST"
    enctype="multipart/form-data" id="form-product">
    @method(isset($product->id) ? 'PUT' : 'POST')
    @csrf

    @if (session('message'))
        <div class="alert alert-{{ session('color') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <input type="hidden" name="id" value="{{ $product->id ?? '' }}">

    <div class="mb-3">
        <label class="form-label">Imagem do Produto</label>
        <div class="input-group">

            {{-- Image cropped --}}
            <input type="hidden" name="image" id="croppedImage"
                value="{{ $product->productDetail->image ?? old('image') }}">

            <input type="file" placeholder="Imagem" id="input-image" class="form-control"
                accept="image/jpeg, image/png, image/gif">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('image') ? $errors->first('image') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="box"></i></span>
            <input type="text" placeholder="Nome" name="name" class="form-control"
                value="{{ $product->name ?? old('name') }}">
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('name') ? $errors->first('name') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descrição</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="file-text"></i></span>
            <textarea rows="" cols="1" name="description" class="form-control">{{ $product->description ?? old('description') }}</textarea>
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('description') ? $errors->first('description') : '' }}
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="" class="form-label">Preço de Venda</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="dollar-sign"></i></span>
                <input type="number" placeholder="Preço de Venda" name="sale_price" class="form-control"
                    value="{{ $product->productStock->sale_price ?? old('sale_price') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('sale_price') ? $errors->first('sale_price') : '' }}
            </div>
        </div>

        <div class="col mb-3">
            <label for="" class="form-label">Quantidade</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="database"></i></span>
                <input type="number" placeholder="Quantidade" name="quantity" class="form-control"
                    value="{{ $product->productStock->quantity ?? old('quantity') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('quantity') ? $errors->first('quantity') : '' }}
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Fornecedor</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="tag"></i></span>
            <select name="provider_id" class="form-control">
                <option>Selecione o fornecedor</option>
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}"
                        {{ ($product->provider_id ?? old('provider_id')) == $provider->id ? 'selected' : '' }}>
                        {{ $provider->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('provider_id') ? $errors->first('provider_id') : '' }}
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Unidade de Medida</label>
        <div class="input-group">
            <span class="input-group-text"><i data-feather="crop"></i></span>
            <select name="unity_id" class="form-control">
                <option>Selecione a unidade de medida</option>
                @foreach ($units as $unity)
                    <option value="{{ $unity->id }}"
                        {{ ($product->productDetail->unity_id ?? old('unity_id')) == $unity->id ? 'selected' : '' }}>
                        {{ $unity->description }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-text text-danger">
            {{ $errors->has('unity_id') ? $errors->first('unity_id') : '' }}
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="" class="form-label">Comprimento</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="hash"></i></span>
                <input type="number" placeholder="Comprimento" name="length" class="form-control"
                    value="{{ $product->productDetail->length ?? old('length') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('length') ? $errors->first('length') : '' }}
            </div>
        </div>
        <div class="col mb-3">
            <label for="" class="form-label">Altura</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="hash"></i></span>
                <input type="number" placeholder="Altura" name="height" class="form-control"
                    value="{{ $product->productDetail->height ?? old('height') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('height') ? $errors->first('height') : '' }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="" class="form-label">Largura</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="hash"></i></span>
                <input type="number" placeholder="Largura" name="width" class="form-control"
                    value="{{ $product->productDetail->width ?? old('width') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('width') ? $errors->first('width') : '' }}
            </div>
        </div>
        <div class="col mb-3">
            <label for="" class="form-label">Peso</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="hash"></i></span>
                <input type="number" placeholder="Peso" name="weight" class="form-control"
                    value="{{ $product->productDetail->weight ?? old('weight') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('weight') ? $errors->first('weight') : '' }}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col mb-3">
            <label for="" class="form-label">Estoque mínimo</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="trending-down"></i></span>
                <input type="number" placeholder="Estoque mínimo" name="min_stock" class="form-control"
                    value="{{ $product->productStock->min_stock ?? old('min_stock') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('min_stock') ? $errors->first('min_stock') : '' }}
            </div>
        </div>
        <div class="col mb-3">
            <label for="" class="form-label">Estoque máximo</label>
            <div class="input-group">
                <span class="input-group-text"><i data-feather="trending-up"></i></span>
                <input type="number" placeholder="Estoque máximo" name="max_stock" class="form-control"
                    value="{{ $product->productStock->max_stock ?? old('max_stock') }}" step="0.01">
            </div>
            <div class="form-text text-danger">
                {{ $errors->has('max_stock') ? $errors->first('max_stock') : '' }}
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-secondary">{{ isset($product->id) ? 'Salvar' : 'Cadastrar' }}</button>
</form>
