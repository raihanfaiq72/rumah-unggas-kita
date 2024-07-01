
<div class="col-lg-9">
    <div class="row g-4 justify-content-center">

        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <!--[if BLOCK]><![endif]--><?php if($p->gambar): ?>
                    <img src="admin/upload/<?php echo e($p->gambar); ?>" class="img-fluid w-100 rounded-top" alt="">
                    <?php else: ?>
                    <img src="<?php echo e(url('')); ?>/img/Kalkun.png" class="img-fluid w-100 rounded-top" alt="">
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                    <!--[if BLOCK]><![endif]--><?php if($p->kategori == 1): ?>
                    Ayam
                    <?php elseif($p->kategori == 2): ?>
                    Bebek
                    <?php elseif($p->kategori == 3): ?>
                    Dara
                    <?php else: ?>
                    Kalkun
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <a href="<?php echo e(url('produk/'.$p->id,[])); ?>">
                        <h4><?php echo e($p->nama); ?></h4>
                    </a>
                    <a href="<?php echo e(url('produk/'.$p->id,[])); ?>">
                        <p><?php echo e($p->deskripsi); ?></p>
                    </a>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
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
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <!-- <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                <a href="#" class="rounded">&laquo;</a>
                <a href="#" class="active rounded">1</a>
                <a href="#" class="rounded">2</a>
                <a href="#" class="rounded">3</a>
                <a href="#" class="rounded">4</a>
                <a href="#" class="rounded">5</a>
                <a href="#" class="rounded">6</a>
                <a href="#" class="rounded">&raquo;</a>
            </div>
        </div> -->
        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                <!--[if BLOCK]><![endif]--><?php if($data->lastPage() > 1): ?>
                <a href="<?php echo e($data->previousPageUrl()); ?>" class="rounded">&laquo;</a>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data->getUrlRange(1, $data->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($url); ?>"
                    class="rounded<?php echo e(($page == $data->currentPage()) ? ' active' : ''); ?>"><?php echo e($page); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                <a href="<?php echo e($data->nextPageUrl()); ?>" class="rounded">&raquo;</a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/livewire/produk-live.blade.php ENDPATH**/ ?>