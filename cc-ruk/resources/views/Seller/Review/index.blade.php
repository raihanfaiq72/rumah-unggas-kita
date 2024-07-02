@extends($auth)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')

@endsection

@section('sudahlogin')
<!-- Bootstrap -->
<link href="{{url('')}}/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{url('')}}/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="{{url('')}}/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="{{url('')}}/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="{{url('')}}/admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="{{url('')}}/admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="{{url('')}}/admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="{{url('')}}/admin/vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="{{url('')}}/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{url('')}}/admin/build/css/custom.min.css" rel="stylesheet">
<!-- disini -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Elements</h3>
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

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="ln_solid"></div>
                    <form action="{{url('review-barang')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$review->id}}" name="id">
                        @if($review)
                        <input type="hidden" name="idTransaksi" value="{{$data->id}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 ">Review</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea class="resizable_textarea form-control"
                                    placeholder="Masukan review anda disini" name="isi">{{$review->isi}}</textarea>
                                <br>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="idTransaksi" value="{{$data->id}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 ">Review</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea class="resizable_textarea form-control"
                                    placeholder="Masukan review anda disini" name="isi"></textarea>
                                <br>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

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
@include('Layout/Auth/footer')
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
