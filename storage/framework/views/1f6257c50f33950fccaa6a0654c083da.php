<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->make('Layout/single-page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">

            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo e(url('toko/produk/'.$p->id,[])); ?>">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img src="img/example.webp" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-secondary text-center p-4 rounded">
                                <h5 class="text-white"><?php echo e($p->nama_toko); ?></h5>
                                <!-- <h3 class="mb-0"><?php echo e($p->deskripsi); ?></h3> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img src="img/example.webp" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-secondary text-center p-4 rounded">
                                <h5 class="text-white">wooops kosong</h5>
                                <!-- <h3 class="mb-0">Discount 30$</h3> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php echo $__env->make('Layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($buyer, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Buyer/Dashboard/toko.blade.php ENDPATH**/ ?>