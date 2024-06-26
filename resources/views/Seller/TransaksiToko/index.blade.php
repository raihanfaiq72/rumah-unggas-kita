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
                <h3>Transaksi</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
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

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaksi Pembeli Di Toko Anda</h2>
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

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title"># </th>
                                        <th class="column-title">No Invoice </th>
                                        <th class="column-title">Pembeli </th>
                                        <th class="column-title">Barang </th>
                                        <th class="column-title">Jumlah </th>
                                        <th class="column-title">Jumlah Bayar </th>
                                        <th class="column-title">Status </th>
                                        <th class="column-title no-link last"><span class="nobr">Detail</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                    class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($data as $p)
                                    <tr class="even pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                        </td>
                                        <td class=" ">{{$loop->iteration}}</td>
                                        <td class=" ">{{$p->no_transaksi}} </td>
                                        <td class=" ">{{$p->user->nama_lengkap}} <i class="success fa fa-long-arrow-up"></i></td>
                                        <td class=" ">{{$p->item->nama}}</td>
                                        <td class=" ">{{$p->jumlah}}</td>
                                        <td class="a-right a-right ">{{$p->jumlah_bayar}}</td>
                                        <td class="a-right a-right ">
                                            @if($p->status == 1)
                                                sedang di cart pelanggan
                                            @elseif($p->status == 2)
                                                sudah di cekot 
                                            @elseif($p->status == 3)
                                                sedang dikirim
                                            @else
                                                selesai
                                            @endif
                                        </td>
                                        <td class=" last"><a href="{{url('user/management-transaksi-toko/'.$p->id,[])}}">View</a>
                                        <td class=" last"><a href="{{url('user/management-transaksi-toko/'.$p->id,[])}}/edit">Edit</a>

                                    </td>
                                    </tr>
                                    @empty
                                    <h1>Bjiir Kosong</h1>
                                    @endforelse
                                    
                                </tbody>
                            </table>
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
