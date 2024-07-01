@extends($buyer)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('main')
@include('Layout/single-page-header1')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
            @elseif (session()->has('gagal'))
            <div class="alert alert-danger" role="alert">
                {{ session('gagal') }}
            </div>
            @elseif (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Toko</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                    <tr>
                        <th>{{$data->toko->nama_toko}}</th>
                        <th scope="row">
                            @if($data->item->gambar)
                            <div class="d-flex align-items-center">
                                <img src="{{url('')}}/admin/upload/{{$data->item->gambar}}"
                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                            @else
                            <div class="d-flex align-items-center">
                                <img src="{{url('')}}/img/Kalkun.png" class="img-fluid me-5 rounded-circle"
                                    style="width: 80px; height: 80px;" alt="">
                            </div>
                            @endif
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{$data->item->nama}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp {{$data->item->harga}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$data->jumlah}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp {{$data->jumlah_bayar}}</p>
                        </td>
                        <td>
                            <form action="{{ url('delete-item/'.$data->id) }}" method="POST"
                                onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>
                        </td>
                        <script>
                            function confirmDelete() {
                                return confirm('Apakah Anda yakin ingin menghapus item ini dari cart?');
                            }

                        </script>
                    </tr>
                    @else
                    <h1>Whoops kosong</h1>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Total<span class="fw-normal"> Bayar</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">Rp {{$total}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping</h5>
                            <div class="">
                                <p class="mb-0">Flat rate: Rp 10.000</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">Shipping to Rumah Anda</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">Rp {{$bTotal}}</p>
                    </div>
                    <a href="{{url('cekot-staging/'.$data->id,[])}}">
                        <button
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proses cekot</button>
                    </a>
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
