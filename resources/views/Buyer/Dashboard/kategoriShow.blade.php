@extends($buyer)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
@include('Layout/single-page-header')
<!-- Hero Start -->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label for="fruits">Default Sorting:</label>
                            <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                form="fruitform">
                                <option value="volvo">Nothing</option>
                                <option value="saab">Popularity</option>
                                <option value="opel">Organic</option>
                                <option value="audi">Fantastic</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/1')}}"><i
                                                        class="fas fa-apple-alt me-2"></i>Ayam</a>
                                                <!-- <span>(3)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/2')}}"><i
                                                        class="fas fa-apple-alt me-2"></i>Bebek</a>
                                                <!-- <span>(5)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/3')}}"><i
                                                        class="fas fa-apple-alt me-2"></i>Dara</a>
                                                <!-- <span>(2)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/4')}}"><i
                                                        class="fas fa-apple-alt me-2"></i>Kalkun</a>
                                                <!-- <span>(8)</span> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="{{url('')}}/img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute"
                                        style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">

                            @forelse($data as $p )
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        @if($p->gambar)
                                        <img src="{{url('')}}/admin/upload/{{$p->gambar}}"
                                            class="img-fluid w-100 rounded-top" alt="">
                                        @else
                                        <img src="{{url('')}}/img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                            alt="">
                                        @endif
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">
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
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            <a href="#"
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
                                    @if ($data->previousPageUrl())
                                    <a href="{{ $data->previousPageUrl() }}" class="rounded">&laquo;</a>
                                    @else
                                    <span class="rounded disabled">&laquo;</span>
                                    @endif

                                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                    <a href="{{ $url }}"
                                        class="rounded{{ ($page == $data->currentPage()) ? ' active' : '' }}">{{ $page }}</a>
                                    @endforeach

                                    @if ($data->nextPageUrl())
                                    <a href="{{ $data->nextPageUrl() }}" class="rounded">&raquo;</a>
                                    @else
                                    <span class="rounded disabled">&raquo;</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('Layout/footer')
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
