<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sudahlogin'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile</h3>
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
                        <h2>Account</h2>
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
                        <form action="<?php echo e(url('user/profile')); ?>/update" method="POST" id="demo-form2"
                            data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <?php if(session()->has('sukses')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('sukses')); ?>

                            </div>
                            <?php elseif(session()->has('gagal')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('gagal')); ?>

                            </div>
                            <?php elseif(count($errors) > 0): ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Terjadi kesalahan:</strong>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <input type="hidden" name="id" value="<?php echo e($profile->id); ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control "
                                        name="username" value="<?php echo e($profile->username); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Lengkap
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="nama_lengkap" required="required"
                                        class="form-control" value="<?php echo e($profile->nama_lengkap); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text"
                                        value="<?php echo e($profile->katasandi); ?>" name="password">
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
                </div>
            </div>
        </div>

    </div>
</div>
<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
<script src="<?php echo e(url('')); ?>/admin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo e(url('')); ?>/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo e(url('')); ?>/admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo e(url('')); ?>/admin/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo e(url('')); ?>/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo e(url('')); ?>/admin/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(url('')); ?>/admin/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo e(url('')); ?>/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?php echo e(url('')); ?>/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo e(url('')); ?>/admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo e(url('')); ?>/admin/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?php echo e(url('')); ?>/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?php echo e(url('')); ?>/admin/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo e(url('')); ?>/admin/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?php echo e(url('')); ?>/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?php echo e(url('')); ?>/admin/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo e(url('')); ?>/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?php echo e(url('')); ?>/admin/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo e(url('')); ?>/admin/build/js/custom.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($auth, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Seller/Profile/edit.blade.php ENDPATH**/ ?>