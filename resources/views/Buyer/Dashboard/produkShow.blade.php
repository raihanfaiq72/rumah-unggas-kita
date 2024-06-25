@extends($buyer)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
@include('Layout/single-page-header')
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                @if($data->gambar)
                                <img src="{{url('')}}/admin/upload/{{$data->gambar}}" class="img-fluid rounded"
                                    alt="ImageTOd   ">
                                @else
                                <img src="{{url('')}}/img/Kalkun.png" class="img-fluid rounded" alt="ImageTOd   ">
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{$data->nama}}</h4>
                        <p class="mb-3">Category:
                            @if($data->kategori == 1)
                            Ayam
                            @elseif($data->kategori == 2)
                            Bebek
                            @elseif($data->kategori == 3)
                            Dara
                            @else
                            kalkun
                            @endif
                        </p>
                        <form action="{{url('add-to-cart')}}" method="post">
                        <h5 class="fw-bold mb-3">Rp {{$data->harga}}</h5>
                        <p class="mb-4">{{$data->deskripsi}}</p>
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="jumlah" class="form-control form-control-sm text-center border-0" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                            @csrf
                            <input type="hidden" name="idItem" value="{{$data->id}}" >
                            <button type="submit"
                                class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>{{$data->deskripsi}}</p>
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div
                                                class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">1 kg</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Country of Origin</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Agro Farm</p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Quality</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Organic</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Сheck</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Healthy</p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Min Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">250 Kg</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
                                    sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <form action="{{ url('hasil-pencarian') }}" method="GET" class="w-100">
                            <input type="search" class="form-control p-3" placeholder="Search keywords"
                                aria-label="Search keywords" aria-describedby="search-icon-1" name="keyword">
                            <button type="submit" class="btn btn-primary">Cari <i class="fa fa-search"></i></button>
                        </form>
                        <div class="mb-4">
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

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="mb-4">Featured products</h4>

                        @forelse($prodTok as $p)
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="{{url('')}}/admin/upload/{{$p->gambar}}" class="img-fluid rounded"
                                    alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">{{$p->nama}}</h6>
                                <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">Rp {{$p->harga}}</h5>
                                    <!-- <h5 class="text-danger text-decoration-line-through"></h5> -->
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="{{url('')}}/img/featur-1.jpg" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">whoops kosong</h6>
                            </div>
                        </div>
                        @endforelse

                        <div class="d-flex justify-content-center my-4">
                            <a href="#"
                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                More</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <img src="{{url('')}}/img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Unggas <br> Segar <br> Banner</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="fw-bold mb-0">Produk Lainnya</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">

                @foreach($random as $p)
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        @if($p->gambar)
                        <img src="{{url('')}}/admin/upload/{{$p->gambar}}" class="img-fluid w-100 rounded-top" alt="">
                        @else
                        <img src="{{url('')}}/img/Kalkun.png" class="img-fluid w-100 rounded-top" alt="">
                        @endif
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">
                        @if($data->kategori == 1)
                        Ayam
                        @elseif($data->kategori == 2)
                        Bebek
                        @elseif($data->kategori == 3)
                        Dara
                        @else
                        kalkun
                        @endif
                    </div>
                    <div class="p-4 pb-0 rounded-bottom">
                        <a href="{{url('produk/'.$p->id,[])}}">
                            <h4>{{$p->nama}}</h4>
                        </a>
                        <a href="{{url('produk/'.$p->id,[])}}">
                            <p>{{$p->deskripsi}}</p>
                        </a>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold">{{$p->harga}}</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach

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
