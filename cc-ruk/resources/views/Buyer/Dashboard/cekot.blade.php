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
                        <th scope="col">#</th>
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
                    @forelse($data as $p)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{$p->toko->nama_toko}}</th>
                        <th scope="row">
                            @if($p->item->gambar)
                            <div class="d-flex align-items-center">
                                <img src="{{url('')}}/admin/upload/{{$p->item->gambar}}"
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
                            <p class="mb-0 mt-4">{{$p->item->nama}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp {{$p->item->harga}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$p->jumlah}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp {{$p->jumlah_bayar}}</p>
                        </td>
                        <td>
                            <a href="{{url('cekot-sebelum-staging/'.$p->id)}}">
                                <button
                                    class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                    type="button">Cekot</button>
                            </a>
                        </td>
                        <script>
                            function confirmDelete() {
                                return confirm('Apakah Anda yakin ingin menghapus item ini dari cart?');
                            }

                        </script>
                    </tr>
                    @empty
                    <tr>
                        <h1>whoops kosong</h1>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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
