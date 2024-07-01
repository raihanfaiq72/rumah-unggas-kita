<?php $__env->startSection('css-library'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-custom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->make('Layout/single-page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our
                    home page or try to use a search?</p>
                <a class="btn border-secondary rounded-pill py-3 px-5" href="<?php echo e(url('/')); ?>">Go Back To Home</a>
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
<?php echo $__env->make($buyer, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/404/404.blade.php ENDPATH**/ ?>