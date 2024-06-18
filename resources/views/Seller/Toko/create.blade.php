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
                <h3>Toko Anda!</h3>
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
                        <h2>Informasi Toko</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if($toko)
                        <p>Selamat datang di toko anda , silahkan manage toko anda</p>
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
                        <form action="{{url('user/toko')}}/update" method="POST" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$toko->id}}">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Toko
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control "
                                        name="nama_toko" value="{{ $toko->nama_toko }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat Toko
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="alamat" required="required"
                                        class="form-control" value="{{ $toko->alamat }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                    Telepon</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text"
                                        value="{{ $toko->nomor_telp}}" name="nomor_telp">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" value="{{ $toko->deskripsi }}"
                                        type="text" name="deskripsi">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                        @else
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Wajib Dibaca</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <h3>Ketentuan Penggunaan untuk Membuka Toko di "Rumah Unggas Kita"</h3>
                                        <p><strong>1. Pengantar</strong></p>
                                        <p>Dengan mendaftar dan membuka toko di "Rumah Unggas Kita", Anda setuju untuk
                                            mematuhi dan terikat oleh syarat dan ketentuan berikut. Ketentuan ini
                                            mengatur penggunaan situs web kami dan layanan yang kami sediakan. Jika Anda
                                            tidak setuju dengan bagian mana pun dari ketentuan ini, Anda tidak boleh
                                            membuka toko atau menggunakan layanan kami.</p>

                                        <p><strong>2. Pendaftaran Toko</strong></p>
                                        <p>Untuk membuka toko di "Rumah Unggas Kita", Anda harus menyelesaikan proses
                                            pendaftaran dengan memberikan informasi yang terkini, lengkap, dan akurat
                                            sesuai yang diperlukan oleh formulir pendaftaran kami. Anda bertanggung
                                            jawab untuk menjaga kerahasiaan informasi akun Anda dan untuk semua
                                            aktivitas yang terjadi di bawah akun Anda.</p>

                                        <p><strong>3. Kepatuhan Terhadap Hukum</strong></p>
                                        <p>Anda setuju untuk mematuhi semua hukum dan peraturan yang berlaku terkait
                                            operasi toko Anda dan produk yang Anda tawarkan. Ini termasuk, namun tidak
                                            terbatas pada, hukum perlindungan konsumen, hukum kekayaan intelektual, dan
                                            peraturan perpajakan.</p>

                                        <p><strong>4. Konten Toko</strong></p>
                                        <p>Anda bertanggung jawab atas semua konten dan materi yang Anda poskan atau
                                            tampilkan di toko Anda, termasuk deskripsi produk, harga, dan gambar. Anda
                                            menjamin bahwa Anda memiliki atau telah memperoleh lisensi, hak, dan izin
                                            yang diperlukan untuk menggunakan dan mendistribusikan semua konten yang
                                            diposkan di toko Anda.</p>

                                        <p><strong>5. Aktivitas yang Dilarang</strong></p>
                                        <p>Anda setuju untuk tidak terlibat dalam aktivitas berikut yang dilarang:</p>
                                        <ul>
                                            <li>Menjual produk ilegal, palsu, atau curian.</li>
                                            <li>Terlibat dalam praktik penipuan atau menyesatkan.</li>
                                            <li>Memposting konten yang cabul, memfitnah, atau merugikan.</li>
                                            <li>Melanggar hak kekayaan intelektual pihak lain.</li>
                                        </ul>

                                        <p><strong>6. Biaya dan Pembayaran</strong></p>
                                        <p>Dengan membuka toko, Anda setuju untuk membayar semua biaya dan biaya yang
                                            berlaku sesuai dengan jadwal biaya kami. Pembayaran untuk transaksi yang
                                            dilakukan melalui toko Anda akan diproses sesuai dengan kebijakan pembayaran
                                            kami.</p>

                                        <p><strong>7. Penghentian</strong></p>
                                        <p>Kami berhak untuk menangguhkan atau menghentikan akun toko Anda jika Anda
                                            melanggar ketentuan ini atau terlibat dalam perilaku yang kami anggap
                                            merugikan situs web kami atau pengguna lainnya. Setelah penghentian, Anda
                                            harus segera menghentikan semua penggunaan layanan kami.</p>

                                        <p><strong>8. Batasan Tanggung Jawab</strong></p>
                                        <p>"Rumah Unggas Kita" tidak akan bertanggung jawab atas kerugian langsung,
                                            tidak langsung, insidental, khusus, atau konsekuensial yang diakibatkan dari
                                            penggunaan atau ketidakmampuan untuk menggunakan layanan kami, termasuk
                                            namun tidak terbatas pada, kehilangan keuntungan, data, atau kerugian tidak
                                            berwujud lainnya.</p>

                                        <p><strong>9. Perubahan</strong></p>
                                        <p>Kami berhak untuk mengubah ketentuan ini kapan saja. Setiap perubahan akan
                                            diposkan di situs web kami, dan penggunaan layanan Anda yang berkelanjutan
                                            setelah perubahan tersebut akan dianggap sebagai penerimaan Anda terhadap
                                            ketentuan baru.</p>

                                        <p><strong>10. Informasi Kontak</strong></p>
                                        <p>Jika Anda memiliki pertanyaan atau kekhawatiran mengenai ketentuan ini,
                                            silakan hubungi kami di <a href="#">Admin Rumah Unggas Kita</a>.</p>
                                        <button id="agreeButton" class="btn btn-success">Saya Paham dan Saya Akan
                                            Menaati</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="formContainer" style="display:none;">
                            <form action="{{ url('user/toko') }}" method="POST" id="demo-form2" data-parsley-validate
                                class="form-horizontal form-label-left">
                                @csrf
                                <p>Anda belum membuka toko, silahkan buka toko anda terlebih dahulu</p>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                                        Toko <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="first-name" required="required" class="form-control"
                                            name="nama_toko">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat
                                        Toko <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="last-name" name="alamat" required="required"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                        Telepon</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control" type="text" name="nomor_telp">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control" type="text" name="deskripsi">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- footer content -->
<footer>
    <div class="pull-right">
        Kelompok Tiga <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tatlerasia.com%2Fpeople%2Fganjar-pranowo&psig=AOvVaw3w_nG4yuHPSny2mExiV4Rn&ust=1718814896610000&source=images&cd=vfe&opi=89978449&ved=0CBAQjRxqFwoTCLiMwuDK5YYDFQAAAAAdAAAAABAE">Coblos nomor 3</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#agreeButton').on('click', function () {
            $('#formContainer').show();
        });
    });

</script>
<!-- jQuery -->
<script src="{{url('')}}/admin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{url('')}}/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{url('')}}/admin/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{url('')}}/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="{{url('')}}/admin/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{url('')}}/admin/vendors/moment/min/moment.min.js"></script>
<script src="{{url('')}}/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{url('')}}/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="{{url('')}}/admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="{{url('')}}/admin/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="{{url('')}}/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="{{url('')}}/admin/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="{{url('')}}/admin/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="{{url('')}}/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="{{url('')}}/admin/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="{{url('')}}/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="{{url('')}}/admin/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="{{url('')}}/admin/build/js/custom.min.js"></script>
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
