@extends($buyer)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
@include('Layout/single-page-header')
<!-- resources/views/item/search-results.blade.php -->
<div class="container">
    <h1>Hasil Pencarian untuk "{{ $keyword }}"</h1>

    @if ($item->isEmpty())
    <p>Tidak ditemukan hasil untuk pencarian ini.</p>
    @else
    <ul>
        @foreach ($item as $item)
        <li>{{ $item->nama }}</li> <!-- Sesuaikan dengan atribut yang sesuai -->
        @endforeach
    </ul>

    <!-- Tampilkan navigasi halaman manual untuk hasil pencarian -->
    <div class="pagination d-flex justify-content-center mt-5">
        {{-- 
            @if ($item->previousPageUrl())
        <a href="{{ $item->previousPageUrl() }}" class="rounded">&laquo;</a>
        @else
        <span class="rounded disabled">&laquo;</span>
        @endif

        @foreach ($item->getUrlRange(1, $item->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="rounded{{ ($page == $item->currentPage()) ? ' active' : '' }}">{{ $page }}</a>
        @endforeach

        @if ($item->nextPageUrl())
        <a href="{{ $item->nextPageUrl() }}" class="rounded">&raquo;</a>
        @else
        <span class="rounded disabled">&raquo;</span>
        @endif
        --}}
    </div>
    @endif
</div>
@include('Layout/footer')
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
