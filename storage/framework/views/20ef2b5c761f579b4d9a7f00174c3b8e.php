<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e($title); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo e(url('')); ?>/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(url('')); ?>/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(url('')); ?>/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo e(url('')); ?>/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(url('')); ?>/admin/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo e(url('registerProses')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
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
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap"
                                required="" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                required="" />
                        </div>
                        <div>
                            <button type="submit">Daftar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="<?php echo e(url('login')); ?>" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and
                                    Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>


        </div>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Auth/register.blade.php ENDPATH**/ ?>