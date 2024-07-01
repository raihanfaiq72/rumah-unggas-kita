<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->make('Layout/single-page-header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
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
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th><?php echo e($loop->iteration); ?></th>
                        <th><?php echo e($p->toko->nama_toko); ?></th>
                        <th scope="row">
                            <?php if($p->item->gambar): ?>
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(url('')); ?>/admin/upload/<?php echo e($p->item->gambar); ?>"
                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                            <?php else: ?>
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(url('')); ?>/img/Kalkun.png" class="img-fluid me-5 rounded-circle"
                                    style="width: 80px; height: 80px;" alt="">
                            </div>
                            <?php endif; ?>
                        </th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo e($p->item->nama); ?></p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp <?php echo e($p->item->harga); ?></p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">1</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp <?php echo e($p->jumlah_bayar); ?></p>
                        </td>
                        <td>
                            <form action="<?php echo e(url('delete-item/'.$p->id)); ?>" method="POST"
                                onsubmit="return confirmDelete()">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>
                        </td>
                        <script>
                            function confirmDelete() {
                                return confirm('Apakah Anda yakin ingin menghapus item ini dari cart?');
                            }

                        </script>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <h1>whoops kosong</h1>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Total<span class="fw-normal"> Bayar</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">Rp <?php echo e($total); ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping</h5>
                            <div class="">
                                <p class="mb-0">Flat rate: Rp 10.000</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">Shipping to Rumah Anda</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">Rp <?php echo e($bTotal); ?></p>
                    </div>
                    <a href="<?php echo e(url('cekot-staging')); ?>">
                        <button
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proses cekot</button>
                    </a>
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

<?php echo $__env->make($buyer, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Buyer/Dashboard/cekot.blade.php ENDPATH**/ ?>