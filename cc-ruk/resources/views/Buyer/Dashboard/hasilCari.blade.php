@extends($buyer)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
@include('Layout/single-page-header1')
<!-- resources/views/item/search-results.blade.php -->
<div class="container">
    <h1>Hasil Pencarian untuk "{{ $keyword }}"</h1>

    @if ($item->isEmpty())
    <p>Tidak ditemukan hasil untuk pencarian ini.</p>
    @else

    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">

                @forelse($item as $p)
                <div class="col-md-6 col-lg-4">
                    <a href="{{url('produk/'.$p->id,[])}}">
                        <div class="service-item bg-primary rounded border border-primary">
                            <img src="{{url('')}}/admin/upload/{{$p->gambar}}" class="img-fluid rounded-top w-100"
                                alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-secondary text-center p-4 rounded">
                                    <h5 class="text-white">{{$p->nama}}</h5>
                                    <h3 class="mb-0">{{$p->toko->nama_toko}}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-primary rounded border border-primary">
                            <img src="img/example.webp" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-secondary text-center p-4 rounded">
                                    <h5 class="text-white">wooops kosong</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>




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
