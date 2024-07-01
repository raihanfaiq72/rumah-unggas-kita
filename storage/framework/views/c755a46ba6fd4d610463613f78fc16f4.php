<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->make('Layout/single-page-header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
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
        <form action="<?php echo e(url('cekot-final')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Username<sup>*</sup></label>
                                <input type="text" class="form-control" value="<?php echo e(session()->get('username')); ?>"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Nama Lengkap<sup>*</sup></label>
                                <input type="text" class="form-control" value="<?php echo e(session()->get('nama_lengkap')); ?>"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-item">
                        <textarea name="order_notes" class="form-control" spellcheck="false" cols="30" rows="11"
                            placeholder="Order Notes (Optional)"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="idItem" value="<?php echo e($p->id); ?>">
                                <tr>
                                    <td class="py-5"><?php echo e($loop->iteration); ?></td>
                                    <td scope="row">
                                        <?php if($p->item->gambar): ?>
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?php echo e(url('')); ?>/admin/upload/<?php echo e($p->item->gambar); ?>"
                                                class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                alt="">
                                        </div>
                                        <?php else: ?>
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?php echo e(url('')); ?>/img/Kalkun.png" class="img-fluid rounded-circle"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-5"><?php echo e($p->item->nama); ?></td>
                                    <td class="py-5">Rp <?php echo e($p->jumlah_bayar); ?></td>
                                    <td class="py-5">1</td>
                                    <td class="py-5">Rp <?php echo e($p->jumlah_bayar); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="row"></th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">Rp <?php echo e($bTotal); ?></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <label class="form-check-label" for="Paypal-1"><strong>Metode Pembayaran : </strong>
                                    PEMBAYARAN CASH</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Buat
                            Pesanan</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<?php echo $__env->make('Layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($buyer, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Buyer/Dashboard/cekotStaging.blade.php ENDPATH**/ ?>