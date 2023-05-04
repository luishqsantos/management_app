

<div class="table-responsive">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th class="d-none d-md-table-cell">Descrição</th>
                        <th class="d-none d-xl-table-cell">Fornecedor</th>
                        <th class="d-none d-xl-table-cell">Preço</th>
                        <th class="d-none d-xl-table-cell">Quantidade</th>
                        <th class="d-none d-xl-table-cell">Total</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="d-none d-md-table-cell">{{ $product->description }}</td>
                            <td class="d-none d-md-table-cell">{{ $product->provider->name }}</td>
                            <td class="d-none d-md-table-cell"> R$
                                {{ number_format($product->productStock->sale_price, '2', ',', '.') }}</td>
                            <td class="d-none d-md-table-cell">{{ $product->productStock->quantity }}</td>
                            <td class="d-none d-md-table-cell"> R$
                                {{ number_format($product->productStock->total, '2', ',', '.') }}</td>

                            <td>
                                <div class="btn-group dropstart">
                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Ações
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" id="product_show_{{ $product->id }}"
                                                data-value="{{ route('product.show', $product->id) }}"
                                                onclick="productShow({{ $product->id }})">Visualizar</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('product.edit', $product->id) }}">Editar</a></li>
                                        <li class="dropdown-item">
                                            <form action="{{ route('product.destroy', $product->id) }}" method="post"
                                                id="form_destroy_{{ $product->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" class="text-black"
                                                    onclick="formSubmit({{ $product->id }})">Excluir</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container-fluid text-center mt-3">
                {{ $products->links('app.layouts._partials.pagination') }}
                <p>
                    Exibindo {{ $products->count() }} produto(s) de {{ $products->total() }} (de
                    {{ $products->firstItem() }} a
                    {{ $products->lastItem() }})
                </p>
            </div>
        </div>