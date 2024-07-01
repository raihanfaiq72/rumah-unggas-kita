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
        <h1 class="mb-4">Billing details</h1>
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
        <form action="{{ url('cekot-final') }}" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Username<sup>*</sup></label>
                                <input type="text" class="form-control" value="{{ session()->get('username') }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Nama Lengkap<sup>*</sup></label>
                                <input type="text" class="form-control" value="{{ session()->get('nama_lengkap') }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-item">
                        <textarea name="note" class="form-control" spellcheck="false" cols="30" rows="11"
                            placeholder="Order Notes (Optional)"></textarea>
                    </div>
                </div>
                <form action="{{url('cekot-final')}}" method="POST">
                    @csrf 
                    @method('POST')
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="idUser" value="{{$data->idUser}}">
                    <input type="hidden" name="idToko" value="{{$data->idToko}}">
                    <input type="hidden" name="idItem" value="{{$data->idItem}}">
                    <input type="hidden" name="no_transaksi" value="{{$data->no_transaksi}}">
                    <input type="hidden" name="jumlah" value="{{$data->jumlah}}">
                    <input type="hidden" name="jumlah_bayar" value="{{$data->jumlah_bayar}}">
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            @if($data->item->gambar)
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="{{ url('') }}/admin/upload/{{ $data->item->gambar }}"
                                                    class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                    alt="">
                                            </div>
                                            @else
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="#" class="img-fluid rounded-circle"
                                                    style="width: 90px; height: 90px;" alt="Gambar Kosong">
                                            </div>
                                            @endif
                                        </td>
                                        <td class="py-5">{{ $data->item->nama }}</td>
                                        <td class="py-5">Rp {{ $data->jumlah_bayar }}</td>
                                        <td class="py-5">1</td>
                                        <td class="py-5">Rp {{ $data->jumlah_bayar }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">Ongkir</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">Rp 10000</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">Rp {{ $bTotal }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <label class="form-check-label" for="Paypal-1"><strong>Metode Pembayaran : </strong>
                                        PEMBAYARAN CASH</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Buat
                                Pesanan</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>

    </div>
</div>

@include('Layout/footer')
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
