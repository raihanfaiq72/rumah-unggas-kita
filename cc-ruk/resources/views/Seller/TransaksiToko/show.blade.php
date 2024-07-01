@extends($auth)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('sudahlogin')
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>E-commerce :: Product Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>E-commerce page design</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-7 col-sm-7 ">
                            <div class="product-image">
                                <img src="{{url('')}}/admin/upload/{{$data->item->gambar}}" alt="..." />
                            </div>
                            
                        </div>

                        <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                            <h3 class="prod_title">{{$data->item->nama}}</h3>

                            <p>{{$data->item->deskripsi}}</p>
                            <br />
                            <p>NOTE : {{$data->note}}</p>
                            
                            <div class="">
                                <div class="product_price">
                                    @php
                                        $total = $data->jumlah_bayar + 10000
                                    @endphp
                                    <h1 class="price">{{$total}}</h1>
                                    <span class="price-tax">Ongkir : 10.000</span>
                                    <span class="price-tax">bayar : {{$data->jumlah_bayar}}</span>
                                    <br>
                                </div>
                                <a href="{{url('user/management-transaksi-toko')}}"><button class="btn btn-primary">Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Layout/Auth/footer')
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
