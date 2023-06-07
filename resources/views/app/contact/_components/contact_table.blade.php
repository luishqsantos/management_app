<div class="table-responsive">
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th class="d-none d-xl-table-cell">Telefone</th>
                <th class="d-none d-xl-table-cell">E-mail</th>
                <th>Motivo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contacts as $contact)
                <tr>
                    <td class="py-0"><i
                            class="py-0 text-warning {{ $contact->status ? 'bi-envelope-fill' : 'bi-envelope-paper-fill' }}"
                            style="font-size: 2rem;"></i></td>
                    <td>{{ $contact->name }}</td>
                    <td class="d-none d-xl-table-cell">{{ $contact->telephone }}</td>
                    <td class="d-none d-xl-table-cell">{{ $contact->email }}</td>
                    <td>
                        @php
                            $color = [1 => 'warning', 2 => 'success', 3 => 'info'];
                        @endphp
                        <span class="badge bg-{{ $color[$contact->reason_id] }}">{{ $contact->reason->reason }}</span>
                    </td>
                    <td>
                        <div class="btn-group dropstart">
                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Ações
                            </a>

                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a id="contact_show_{{ $contact->id }}"
                                        data-value="{{ route('contact.show', $contact->id) }}"
                                        onclick="contactShow({{ $contact->id }})">Visualizar</a></li>

                                <li class="dropdown-item"><a href="{{ route('contact.edit', $contact->id) }}">Editar</a>
                                </li>

                                <li class="dropdown-item">
                                    <form action="{{ route('contact.update', $contact->id) }}"
                                        method="post" id="form_destroy_{{ $contact->id }}">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="status" value="{{ $contact->status ? 0 : 1 }}">
                                        <a class="text-black" onclick="formSubmit({{ $contact->id }})">Marcar como
                                            {{ $contact->status ? 'lida' : 'não lida' }}</a>
                                    </form>
                                </li>

                                <li class="dropdown-item">
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="post"
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
