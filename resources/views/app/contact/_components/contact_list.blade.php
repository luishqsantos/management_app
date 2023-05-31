<main class="inbox">
    <ul class="messages">
        @foreach ($contacts as $contact)
            <li class="message unread shadow-lg mb-3 rounded">

                <div class="d-flex justify-content-end">
                    <div class="btn-group dropstart">
                        <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="py-0 bi-gear" style="font-size: 1rem;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ route('contact.show', $contact->id) }}">Visualizar</a></li>
                            </li>
                            <li class="dropdown-item">
                                <form action="{{ route('contact.update', $contact->id) }}"
                                    method="post" id="form_update_{{ $contact->id }}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $contact->status ? 0 : 1 }}">
                                    <a class="text-black" onclick="formUpdate({{ $contact->id }})">Marcar como
                                        {{ $contact->status ? 'lida' : 'não lida' }}</a>
                                </form>
                            </li>
                            <li class="dropdown-item">
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="post"
                                    id="form_destroy_{{ $contact->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="text-black"
                                        onclick="formSubmit({{ $contact->id }})">Excluir</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <a href="{{ route('contact.show', $contact->id) }}">
                    <div class=" d-flex justify-content-between mb-2">
                        @php
                            $color = [1 => 'warning', 2 => 'success', 3 => 'info'];
                        @endphp
                        <span class="badge bg-{{ $color[$contact->reason_id] }}">{{ $contact->reason->reason }}</span>
                        <span class="badge text-body">{{ $contact->created_at->format('d/m/y H:i') }}</span>
                    </div>

                    <div class=" header d-flex justify-content-between mb-2">
                        <span>De: {{ $contact->name }} <br>
                            @: {{ $contact->email }}</span>
                    </div>

                    <div class="description text-truncate">
                        {{ $contact->message }}
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="container-fluid text-center mt-3">
        {{ $contacts->appends(request()->query())->links('app.layouts._partials.pagination') }}
        <p>
            Exibindo {{ $contacts->count() }} mensagem(s) de {{ $contacts->total() }} (de
            {{ $contacts->firstItem() }} a
            {{ $contacts->lastItem() }})
        </p>
    </div>
</main>
