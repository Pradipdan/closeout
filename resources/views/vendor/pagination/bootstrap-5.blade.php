@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center" aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" aria-label="Previous page">
                        <i class="bi bi-arrow-left"></i>
                        <span class="d-none d-sm-inline">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous page">
                        <i class="bi bi-arrow-left"></i>
                        <span class="d-none d-sm-inline">Previous</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled ellipsis"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next page">
                        <span class="d-none d-sm-inline">Next</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" aria-label="Next page">
                        <span class="d-none d-sm-inline">Next</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
