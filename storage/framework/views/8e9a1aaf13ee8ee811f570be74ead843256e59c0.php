<?php $__env->startSection('projectSidebar'); ?>
    <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu active pcoded-trigger">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                <span class="pcoded-mtext">QUẢN LÝ DỰ ÁN</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="active">
                    <a href="<?php echo e(route('projects.index')); ?>">
                        <span class="pcoded-mtext">Danh Sách Dự Án</span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo e(route('projects.create')); ?>">
                        <span class="pcoded-mtext">Thêm Dự Án</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
<?php $__env->stopSection(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/projectSidebar.blade.php ENDPATH**/ ?>