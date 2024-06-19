@extends($buyer)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
@include('Layout/single-page-header')
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">

            @forelse($data as $p)
            <div class="col-md-6 col-lg-4">
                <a href="{{url('toko/'.$p->id,[])}}">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img src="img/example.webp" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-secondary text-center p-4 rounded">
                                <h5 class="text-white">{{$p->nama_toko}}</h5>
                                <!-- <h3 class="mb-0">{{$p->deskripsi}}</h3> -->
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
                                <!-- <h3 class="mb-0">Discount 30$</h3> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforelse

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
