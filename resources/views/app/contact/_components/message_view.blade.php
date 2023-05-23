<div class="container-fluid p-0">
    <div class="card rounded-0 m-0">
        <div class="card-header border-bottom">
            <div class="container-fluid d-flex  px-0 mb-3">
                @php
                    $color = [1 => 'warning', 2 => 'success', 3 => 'info'];
                @endphp
                <span class="badge bg-{{ $color[$contact->reason_id] }} me-auto my-1">{{ $contact->reason->reason }}</span>

                <a href="#" class="btn btn-success btn-sm" title="Responder"><i class="bi-reply"></i></a>
                <a href="#" class="btn btn-info btn-sm ms-1"
                    title="Marcar como {{ $contact->status ? 'lida' : 'não lida' }}">
                    <i class="bi-{{ $contact->status ? 'envelope-open' : 'envelope' }}"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm ms-1" title="Excluir"><i class="bi-trash"></i></a>
            </div>
            <div class="container-fluid px-0 d-flex justify-content-between">
                <h3 class="text-body">{{ $contact->name }}</h3>
                <p class="text-body text-end">{{ $contact->created_at->format('d/m/y H:i') }}</p>
            </div>
            <h6 class="card-subtitle mb-2 text-body"><i class="fw-bold" data-feather="at-sign"></i> {{ $contact->email }}</h6>
            <h6 class="card-subtitle mb-2 text-body"><i class="fw-bold" data-feather="phone"></i> {{ $contact->telephone }}</h6>
        </div>

        <div class="card-body">
            <div class="container-fluid px-0 mb-3">
                <p class="card-text">{{ $contact->message }}</p>
            </div>
        </div>
    </div>
</div>
