<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sudahlogin'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit</h3>
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
                        <h2>Edit Item <small>different form elements</small></h2>
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
                        <form action="<?php echo e(url('user/item-toko')); ?>/update" method="POST" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Barang
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control "
                                        name="nama" value="<?php echo e($data->nama); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deskripsi
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="deskripsi" required="required"
                                        class="form-control" value="<?php echo e($data->deskripsi); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="kategori" id="">
                                        <option value="1">Ayam</option>
                                        <option value="2">Bebek</option>
                                        <option value="3">Dara</option>
                                        <option value="4">Kalkun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text" name="harga" value="<?php echo e($data->harga); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Stok</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text" name="stok" value="<?php echo e($data->stok); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="status" id="">
                                        <option value="1" default>Posting</option>
                                        <option value="2">Draft</option>
                                        <option value="3">Habis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Upload
                                    Gambar</label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="middle-name" class="form-control" type="file" name="photo"
                                        accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="image-preview" class="col-form-label col-md-3 col-sm-3 label-align">Preview
                                    Gambar</label>
                                <div class="col-md-6 col-sm-6">
                                    <img id="image-preview" src="#" alt="Preview Gambar"
                                        style="display: none; width: 100%; max-width: 300px;" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="image-preview" class="col-form-label col-md-3 col-sm-3 label-align">Preview
                                    Gambar Sebelumnya</label>
                                <div class="col-md-6 col-sm-6">
                                    <img id="image-preview" src="<?php echo e(url('')); ?>/admin/upload/<?php echo e($data->gambar); ?>" alt="Preview Gambar"
                                        style="display: none; width: 100%; max-width: 300px;" />
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
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('image-preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>

<?php echo $__env->make('Layout/Auth/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($auth, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Seller/Item/edit.blade.php ENDPATH**/ ?>