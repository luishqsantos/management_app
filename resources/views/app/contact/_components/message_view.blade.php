@php
    $color = [1 => 'warning', 2 => 'success', 3 => 'info'];
@endphp
<div class="container-fluid p-0">

    <div class="card m-3 border border-{{ $color[$contact->reason_id] }} border-3 rounded-3 shadow-lg">
        <div class="card-header">
            <div class="container-fluid d-flex  px-0 mb-3">
                <span class="badge bg-{{ $color[$contact->reason_id] }} me-auto my-1">{{ $contact->reason->reason }}</span>
                @if(!isset($contact->reply->message))
                    <form action="{{ route('contact.update', $contact->id) }}" method="post"
                        id="form_update_{{ $contact->id }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="status" value="{{ $contact->status ? 0 : 1 }}">
                        <a class="btn btn-info btn-sm ms-1" onclick="formUpdate({{ $contact->id }})" title="Marcar como {{ $contact->status ? 'lida' : 'não lida' }}"><i class="bi-{{ $contact->status ? 'envelope-open' : 'envelope' }}"></i></a>
                    </form>
                @endif
                <form action="{{ route('contact.destroy', $contact->id) }}" method="post"
                    id="form_destroy_{{ $contact->id }}">
                    @method('DELETE')
                    @csrf
                    <a href="#" class="btn btn-danger btn-sm ms-1" onclick="formSubmit({{ $contact->id }})"><i class="bi-trash"></i></a>
                </form>
            </div>
            <div class="container-fluid px-0 d-flex justify-content-between">
                <h3 class="text-body">{{ $contact->name }}</h3>
                <p class="text-body text-end">{{ $contact->created_at->format('d/m/y H:i') }}</p>
            </div>
            <h6 class="card-subtitle mb-2 text-body"><i class="fw-bold" data-feather="at-sign"></i>
                {{ $contact->email }}</h6>
            <h6 class="card-subtitle mb-2 text-body"><i class="fw-bold" data-feather="phone"></i>
                {{ $contact->telephone }}</h6>
        </div>

        <div class="card-body">
            {{ $contact->message }}
        </div>
    </div>

    @if (isset($contact->reply->site_contact_id))
        <div class="card m-3 border border-grey border-3 rounded-3 shadow-lg">
            <div class="card-header">
                <div class="container-fluid px-0">
                    <span class="text-body"> <i class="bi-reply-fill text-success fs-3"></i>
                        {{ $contact->reply->created_at->format('d/m/y H:i') }}</span>
                </div>
            </div>
            <div class="card-body">
                {!! $contact->reply->message !!}
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="container-fluid px-0 mb-3">
                    <form action="{{ route('contact.reply') }}" method="post">
                        @csrf
                        <input type="hidden" name="site_contact_id" value="{{ $contact->id }}">
                        <textarea class="form-control" id="text-editor" name="message"></textarea>

                        <div class="container-fluid text-end mt-3">
                            <button class="btn btn-lg btn-success text-end" type="submit"><i data-feather="send"></i>
                                Enviar
                                Resposta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>


@section('script')
    <script src="{{ asset('js/pt_br.js') }}"></script>
    <script>
        var editor = new FroalaEditor('#text-editor', {
            fileUpload: false,
            autofocus: true,

            toolbarButtons: {
                'moreText': {

                    'buttons': ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                        'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle',
                        'clearFormatting'
                    ],
                    'buttonsVisible': 0

                },

                'moreParagraph': {

                    'buttons': ['alignLeft', 'alignCenter', 'formatOLSimple', 'alignRight', 'alignJustify',
                        'formatOL', 'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent',
                        'indent', 'quote'
                    ],
                    'buttonsVisible': 0
                },

                'moreRich': {

                    'buttons': ['insertLink', 'insertTable', 'emoticons',
                        'fontAwesome', 'specialCharacters', 'embedly', 'insertHR'
                    ],
                    'buttonsVisible': 0
                },

                'moreMisc': {

                    'buttons': ['undo', 'redo', 'fullscreen', 'print', 'spellChecker', 'selectAll', 'help'],

                    'align': 'right',

                    'buttonsVisible': 2

                }
            },

            quickInsertButtons: ['embedly', 'table', 'ul', 'ol', 'hr'],

            language: 'pt_br',
        });
    </script>
@endsection
