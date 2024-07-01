<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->make('Layout/single-page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Hero Start -->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Rumah Unggas Kita</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <?php echo $__env->make('Layout/kategoriSearch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="<?php echo e(url('kategori/show/1')); ?>"><i
                                                        class="fas fa-apple-alt me-2"></i>Ayam</a>
                                                <!-- <span>(3)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="<?php echo e(url('kategori/show/2')); ?>"><i
                                                        class="fas fa-apple-alt me-2"></i>Bebek</a>
                                                <!-- <span>(5)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="<?php echo e(url('kategori/show/3')); ?>"><i
                                                        class="fas fa-apple-alt me-2"></i>Dara</a>
                                                <!-- <span>(2)</span> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="<?php echo e(url('kategori/show/4')); ?>"><i
                                                        class="fas fa-apple-alt me-2"></i>Kalkun</a>
                                                <!-- <span>(8)</span> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="mb-3">Featured products</h4>
                                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="<?php echo e(url('')); ?>/admin/upload/<?php echo e($p->gambar); ?>" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2"><?php echo e($p->nama); ?></h6>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2"><?php echo e($p->harga); ?></h5>
                                            <!-- <h5 class="text-danger text-decoration-line-through">4.11 $</h5> -->
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/featur-1.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">Whooops Kosong</h6>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="d-flex justify-content-center my-4">
                                    <a href="#"
                                        class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                        More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="<?php echo e(url('')); ?>/img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute"
                                        style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Unggas <br> Segar <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">

                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <?php if($p->gambar): ?>
                                        <img src="<?php echo e(url('')); ?>/admin/upload/<?php echo e($p->gambar); ?>"
                                            class="img-fluid w-100 rounded-top" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('')); ?>/img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                            alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">
                                        <?php if($p->kategori == 1): ?>
                                        Ayam
                                        <?php elseif($p->kategori == 2): ?>
                                        Bebek
                                        <?php elseif($p->kategori == 3): ?>
                                        Dara
                                        <?php else: ?>
                                        Kalkun
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <a href="<?php echo e(url('produk/'.$p->id,[])); ?>">
                                            <h4><?php echo e($p->nama); ?></h4>
                                        </a>
                                        <a href="<?php echo e(url('produk/'.$p->id,[])); ?>">
                                            <p><?php echo e($p->deskripsi); ?></p>
                                        </a>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">Rp <?php echo e($p->harga); ?></p>
                                            <a href="#"
                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div> -->
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>whooops kosong</h4>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>


                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <?php if($data->previousPageUrl()): ?>
                                    <a href="<?php echo e($data->previousPageUrl()); ?>" class="rounded">&laquo;</a>
                                    <?php else: ?>
                                    <span class="rounded disabled">&laquo;</span>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $data->getUrlRange(1, $data->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($url); ?>"
                                        class="rounded<?php echo e(($page == $data->currentPage()) ? ' active' : ''); ?>"><?php echo e($page); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($data->nextPageUrl()): ?>
                                    <a href="<?php echo e($data->nextPageUrl()); ?>" class="rounded">&raquo;</a>
                                    <?php else: ?>
                                    <span class="rounded disabled">&raquo;</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('Layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($buyer, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Buyer/Dashboard/tokoShow.blade.php ENDPATH**/ ?>