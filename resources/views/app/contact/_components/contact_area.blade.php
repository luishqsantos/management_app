<main class="inbox">
    <ul class="messages">
        @foreach ($contacts as $contact)
            <li class="message unread shadow-lg mb-3 rounded">
                <a href="#">
                    <div class="title d-flex justify-content-between">
                        @php
                            if ($contact->reason_id == 1) {
                                $color = 'warning';
                            } elseif ($contact->reason_id == 2) {
                                $color = 'success';
                            } elseif ($contact->reason_id == 3) {
                                $color = 'info';
                            }
                        @endphp
                        <span class="badge bg-{{ $color }}">{{ $contact->reason->reason }}</span>
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
