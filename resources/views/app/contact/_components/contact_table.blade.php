

<div class="table-responsive">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th class="d-none d-md-table-cell">Telefone</th>
                        <th class="d-none d-xl-table-cell">E-mail</th>
                        <th class="d-none d-xl-table-cell">Motivo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td class="d-none d-md-table-cell">{{ $contact->telephone }}</td>
                            <td class="d-none d-md-table-cell">{{ $contact->email }}</td>
                            <td class="d-none d-md-table-cell">{{ $contact->reason_id }}</td>
                            <td>
                                <div class="btn-group dropstart">
                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Ações
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" id="product_show_{{ $contact->id }}"
                                                data-value="{{ route('product.show', $contact->id) }}"
                                                onclick="productShow({{ $contact->id }})">Visualizar</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('product.edit', $contact->id) }}">Editar</a></li>
                                        <li class="dropdown-item">
                                            <form action="{{ route('product.destroy', $contact->id) }}" method="post"
                                                id="form_destroy_{{ $contact->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" class="text-black"
                                                    onclick="formSubmit({{ $contact->id }})">Excluir</a>
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
                {{ $contacts->links('app.layouts._partials.pagination') }}
                <p>
                    Exibindo {{ $contacts->count() }} produto(s) de {{ $contacts->total() }} (de
                    {{ $contacts->firstItem() }} a
                    {{ $contacts->lastItem() }})
                </p>
            </div>
        </div>