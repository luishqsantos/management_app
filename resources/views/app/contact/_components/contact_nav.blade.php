 @php
    $readActive   = '';
    $unreadActive = '';

    if (isset($status)) {
        ($status) ? $unreadActive = 'active' : '';
    } elseif (!request()->has('status') || request()->query('status')) {
        $unreadActive = 'active';
    }

    if (isset($status)) {
        (!$status) ? $readActive = 'active' : '';
    } elseif (request()->has('status') && !request()->query('status')) {
        $readActive = 'active';
    }
@endphp
<nav>
    <ul class="nav">
        <li class="nav-item py-auto">
            <a class="nav-link d-flex align-items-center {{$unreadActive}}"
                href="{{ route('contact.index', ['status' => 1]) }}"><i
                    class="bi-envelope-fill text-warning fs-3 me-2"></i> Não Lidas <span
                    class="badge bg-danger ms-2">{{ $quantityMessages->unread }}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$readActive}}"
                href="{{ route('contact.index', ['status' => 0]) }}"><i
                    class="bi-envelope-paper-fill text-warning fs-3 me-2"></i> Lidas<span
                    class="badge bg-danger ms-2">{{ $quantityMessages->read }}</span></a>
        </li>
    </ul>
</nav>
