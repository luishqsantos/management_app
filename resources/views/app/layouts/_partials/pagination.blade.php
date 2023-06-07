@if ($paginator->hasPages())
    <div>
        <ul class="pagination justify-content-center">
            {{-- Link para a primeira página --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link text-body">&laquo;</a></li>
            @else
                <li class="page-item"><a class="page-link text-body" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                            data-feather="chevrons-left" class=""></i></a></li>
            @endif

            {{-- Links das páginas atuais --}}
            @if ($paginator->currentPage() > 3)
                <li class="page-item"><a class="page-link text-body" href="{{ $paginator->url(1) }}" rel="prev">1</a></li>
                <li class="page-item disabled"><a class="page-link text-body">...</a></li>
            @endif
            @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
                @else
                    <li class="page-item"><a class="page-link text-body"
                            href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="page-item disabled"><a class="page-link text-body">...</a></li>
                <li class="page-item"><a class="page-link text-body"
                        href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            {{-- Link para a última página --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link text-body" href="{{ $paginator->nextPageUrl() }}"
                        rel="next"><i data-feather="chevrons-right" class=""></i></a></li>
            @else
                <li class="page-item disabled"><a class="page-link text-body">&raquo;</a></li>
            @endif
        </ul>
    </nav>
@endif
