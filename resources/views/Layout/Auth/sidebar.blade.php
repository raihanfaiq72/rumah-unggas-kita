@php
$toko = App\Models\TokoModel::where('idUsers',session()->get('id'))->first();
@endphp
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{url('/')}}"><i class="fa fa-home"></i> Layar Utama</a>
            </li>
            <li>
                <a href="{{url('user/dashboard')}}"><i class="fa fa-home"></i> Home</a>
            </li>
            <li>
                <a href="{{url('user/profile/'.session()->get('id'))}}/edit"><i class="fa fa-home"></i> Profile</a>
            </li>
            <h3>Pesanan Anda</h3>
            <li><a href="#"><i class="fa fa-edit"></i> Check Out </a>
                @if($toko)
                <h3>Toko Anda</h3>
            <li><a><i class="fa fa-edit"></i> {{$toko->nama_toko}} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('user/toko/'.$toko->id)}}/edit">Toko Anda</a></li>
                    <li><a href="{{url('user/item-toko')}}">Item Toko</a></li>
                    <li><a href="{{url('user/management-transaksi-toko')}}">Transaksi Toko</a></li>
                </ul>
            </li>
            @else
            <li>
                <a href="{{ url('user/toko')}}/create"><i class="fa fa-edit"></i> Buka Toko Anda </span></a>
            </li>
            @endif
            <li><a href="{{url('logout')}}"><i class="glyphicon glyphicon-off"></i> Logout </a>
            </li>
        </ul>
    </div>

</div>
