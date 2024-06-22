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
        <h1 class="mb-4">Fresh fruits shop</h1>
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
                                                <a href="{{url('kategori/show/1')}}"><i class="fas fa-apple-alt me-2"></i>Ayam</a>
                                                <!-- <span>(3)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/2')}}"><i class="fas fa-apple-alt me-2"></i>Bebek</a>
                                                <!-- <span>(5)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/3')}}"><i class="fas fa-apple-alt me-2"></i>Dara</a>
                                                <!-- <span>(2)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{url('kategori/show/4')}}"><i class="fas fa-apple-alt me-2"></i>Kalkun</a>
                                                <!-- <span>(8)</span> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute"
                                        style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('produk-live')
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
