<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sudahlogin'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Item Toko</h3>
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
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Item <small> <a href="<?php echo e(url('user/item-toko/create')); ?>"><button>Tambah barang</button></a> </small></h2>
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

                        <div class="row">
                            <?php if($data->isNotEmpty()): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="<?php echo e(url('')); ?>/admin/upload/<?php echo e($p->gambar); ?>"
                                            alt="image" />
                                        <div class="mask">
                                            <p>Your Text</p>
                                            <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="<?php echo e(url('user/item-toko/'.$p->id,[])); ?>/edit"><i class="fa fa-pencil"></i></a>
                                                <a href="#"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p><?php echo e($p->nama ?? 'data kosong'); ?></p>
                                        <p>Rp<?php echo e($p->harga); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="col-md-55">
                                <h2>Bjir kosong ... !</h2>
                            </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('Layout/Auth/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($auth, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Seller/Item/index.blade.php ENDPATH**/ ?>