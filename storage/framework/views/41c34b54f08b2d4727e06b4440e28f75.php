<?php
$toko = App\Models\TokoModel::where('idUsers',session()->get('id'))->first();
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Layar Utama</a>
            </li>
            <li>
                <a href="<?php echo e(url('user/dashboard')); ?>"><i class="fa fa-home"></i> Home</a>
            </li>
            <li>
                <a href="<?php echo e(url('user/profile/'.session()->get('id'))); ?>/edit"><i class="fa fa-home"></i> Profile</a>
            </li>
            <h3>Pesanan Anda</h3>
            <li><a href="#"><i class="fa fa-edit"></i> Check Out </a>
                <?php if($toko): ?>
                <h3>Toko Anda</h3>
            <li><a><i class="fa fa-edit"></i> <?php echo e($toko->nama_toko); ?> <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo e(url('user/toko/'.$toko->id)); ?>/edit">Toko Anda</a></li>
                    <li><a href="<?php echo e(url('user/item-toko')); ?>">Item Toko</a></li>
                    <li><a href="<?php echo e(url('user/management-transaksi-toko')); ?>">Transaksi Toko</a></li>
                </ul>
            </li>
            <?php else: ?>
            <li>
                <a href="<?php echo e(url('user/toko')); ?>/create"><i class="fa fa-edit"></i> Buka Toko Anda </span></a>
            </li>
            <?php endif; ?>
            <li><a href="<?php echo e(url('logout')); ?>"><i class="glyphicon glyphicon-off"></i> Logout </a>
            </li>
        </ul>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Layout/Auth/sidebar.blade.php ENDPATH**/ ?>