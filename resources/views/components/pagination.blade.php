<nav aria-label="Page navigation example">
    <ul class="pagination pagination-primary">
        <li class="page-item">
            <a class="page-link" href="{{ $pagination->previousPageUrl() }}">
                <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
            </a>
        </li>
        @php
            $i = $pagination->currentPage();
        @endphp
        @while ($i <= $pagination->total())
            @if ($i >= $pagination->currentPage() + 3)
                @break
            @endif
            <li class="page-item">
                <a class="page-link {{ $pagination->currentPage() == $i ? 'active' : '' }}" href="{{ $pagination->url($i) }}">{{ $i }}</a>
            </li>
            @php
                $i++;
            @endphp
        @endwhile
        <li class="page-item">
            <a class="page-link" href="{{ $pagination->nextPageUrl() }}">
                <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
            </a>
        </li>
    </ul>
</nav>
