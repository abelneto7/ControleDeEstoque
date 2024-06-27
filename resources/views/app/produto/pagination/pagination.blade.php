<style>
    /* pagination.css */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item {
        list-style: none;
        margin: 0 5px;
    }

    .pagination .page-link {
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        padding: .375rem .75rem;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: default;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>

<nav aria-label="...">
    <ul class="pagination">

        <li class="page-item {{ $produtos->previousPageUrl() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $produtos->previousPageUrl() ?: '#' }}">Previous</a>
        </li>

        {{-- Páginas numéricas --}}
        @for ($i = 1; $i <= $produtos->lastPage(); $i++)
            <li class="page-item {{ $i == $produtos->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $produtos->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Botão "Next" --}}
        <li class="page-item {{ $produtos->nextPageUrl() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $produtos->nextPageUrl() ?: '#' }}">Next</a>
        </li>
    </ul>
</nav>
