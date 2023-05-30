 @php
    $readActive   = '';
    $unreadActive = '';

    if (isset($status)) {
        ($status) ? $unreadActive = 'active-message' : '';
    } elseif (!request()->has('status') || request()->query('status')) {
        $unreadActive = 'active-message';
    }

    if (isset($status)) {
        (!$status) ? $readActive = 'active-message' : '';
    } elseif (request()->has('status') && !request()->query('status')) {
        $readActive = 'active-message';
    }
@endphp
<nav>
    <ul class="nav">
        <li class="nav-item py-1">
            <a class="nav-link d-flex align-items-center {{$unreadActive}} px-auto" href="{{ route('contact.index', ['status' => 1]) }}" title="Mensagens não Lidas">
                <div class="position-relative">
                    <i class="bi-envelope-fill text-warning fs-1 me-2"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $quantityMessages->unread }}</span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$readActive}} px-auto" href="{{ route('contact.index', ['status' => 0]) }}" title="Mensagens Lidas">
                <div class="position-relative">
                    <i class="bi-envelope-paper-fill text-warning fs-2 me-2 position-relative"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $quantityMessages->read }}</span>
                </div>
            </a>
        </li>
    </ul>
</nav>


