<div class="row mt-3 pb-3">
    <div class="col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0 text-dark">Lista de Itens do Pedido</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover my-0 table-striped table-sm" id="product-list">
                    <thead class="table-secondary">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Qtde</th>
                            <th>Un</th>
                            <th>Total</th>
                            <th>Data/Hora</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->amount }}</td>
                                <td>R$ {{ number_format($product->productStock->sale_price, '2', ',', '.') }}</td>
                                <td>R$ {{ number_format($product->pivot->total, '2', ',', '.') }}</td>
                                <td>{{ $product->pivot->created_at->format('d/m/y H:i') }}</td>
                                <td>
                                    <div class="btn-group dropstart">
                                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Ações
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" id="product_item_show_{{ $product->id }}"
                                                        data-value="{{ route('product.show', $product->id) }}"
                                                        onclick="productItemShow({{ $product->id }})">Visualizar</a></li>
                                            <li class="dropdown-item">
                                                <form action="{{ route('product_order.destroy', $product->pivot->id) }}"
                                                    method="post" id="form_destroy_{{ $product->pivot->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="#" class="text-black"
                                                        onclick="formSubmit({{ $product->pivot->id }})">Excluir</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end my-3">
                    <h3>Valor do Pedido : R$ {{ number_format($order->products->sum('pivot.total'), '2', ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
