{{-- The whole world belongs to you. --}}
<div class="col-lg-9">
    <div class="row g-4 justify-content-center">

        @forelse($data as $p )
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <a href="{{ url('produk/'.$p->id)}}">
                        @if($p->gambar)
                        <img src="admin/upload/{{$p->gambar}}" class="img-fluid w-100 rounded-top" alt="">
                        @else
                        <img src="{{url('')}}/img/Kalkun.png" class="img-fluid w-100 rounded-top" alt="">
                        @endif
                    </a>
                </div>
                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                    @if($p->kategori == 1)
                    Ayam
                    @elseif($p->kategori == 2)
                    Bebek
                    @elseif($p->kategori == 3)
                    Dara
                    @else
                    Kalkun
                    @endif
                </div>
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <a href="{{url('produk/'.$p->id,[])}}">
                        <h4>{{$p->nama}}</h4>
                    </a>
                    <a href="{{url('produk/'.$p->id,[])}}">
                        <p>{{$p->deskripsi}}</p>
                    </a>

                    <a href="{{url('toko/produk/'.$p->toko->id,[])}}">
                        <p>Toko : {{$p->toko->nama_toko}}</p>
                    </a>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">Rp {{$p->harga}}</p>
                        <a href="{{url('produk/'.$p->id,[])}}"
                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                </div>
                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div> -->
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <h4>whooops kosong</h4>
                </div>
            </div>
        </div>
        @endforelse

        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                {{-- resources/views/livewire/custom-pagination-view.blade.php --}}
                @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator && $data->lastPage() > 1)
                <div class="pagination d-flex justify-content-center mt-5">
                    @if ($data->onFirstPage())
                    <span class="rounded disabled">&laquo;</span>
                    @else
                    <a href="{{ $data->previousPageUrl() }}" class="rounded">&laquo;</a>
                    @endif

                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                    <a href="{{ $url }}"
                        class="rounded{{ ($page == $data->currentPage()) ? ' active' : '' }}">{{ $page }}</a>
                    @endforeach

                    @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="rounded">&raquo;</a>
                    @else
                    <span class="rounded disabled">&raquo;</span>
                    @endif
                </div>
                @endif

            </div>
        </div>

    </div>
</div>
