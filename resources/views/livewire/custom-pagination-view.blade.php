<!-- resources/views/livewire/custom-pagination-view.blade.php -->
@if ($data->lastPage() > 1)
    <div class="pagination d-flex justify-content-center mt-5">
        @if ($data->onFirstPage())
            <span class="rounded disabled">&laquo;</span>
        @else
            <a href="{{ $data->previousPageUrl() }}" class="rounded">&laquo;</a>
        @endif

        @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="rounded{{ ($page == $data->currentPage()) ? ' active' : '' }}">{{ $page }}</a>
        @endforeach

        @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}" class="rounded">&raquo;</a>
        @else
            <span class="rounded disabled">&raquo;</span>
        @endif
    </div>
@endif
