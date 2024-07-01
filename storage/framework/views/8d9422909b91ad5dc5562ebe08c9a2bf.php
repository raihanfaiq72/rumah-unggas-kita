<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->make('Layout/single-page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- resources/views/item/search-results.blade.php -->
<div class="container">
    <h1>Hasil Pencarian untuk "<?php echo e($keyword); ?>"</h1>

    <?php if($item->isEmpty()): ?>
    <p>Tidak ditemukan hasil untuk pencarian ini.</p>
    <?php else: ?>
    <ul>
        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($item->nama); ?></li> <!-- Sesuaikan dengan atribut yang sesuai -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <!-- Tampilkan navigasi halaman manual untuk hasil pencarian -->
    <div class="pagination d-flex justify-content-center mt-5">
        
    </div>
    <?php endif; ?>
</div>
<?php echo $__env->make('Layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-custom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($buyer, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Buyer/Dashboard/hasilCari.blade.php ENDPATH**/ ?>