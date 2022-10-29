<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">HỆ THỐNG QUẢN LÝ</div>
                
                <?php if(\Illuminate\Support\Facades\Auth::user()->role != 2): ?>
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
                <?php endif; ?>

                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu active pcoded-trigger">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                            <span class="pcoded-mtext">QUẢN LÝ CÔNG VIỆC</span>
                        </a>
                        <ul class="pcoded-submenu">
                            
                            <li class="active">
                                <a href="<?php echo e(route('tasks.index')); ?>">
                                    <span class="pcoded-mtext">Danh Sách Công Việc</span>
                                </a>
                            </li>
                            
                            <?php if(\Illuminate\Support\Facades\Auth::user()->role != 2): ?>
                                <li class="active">
                                    <a href="<?php echo e(route('tasks.create')); ?>">
                                        <span class="pcoded-mtext">Thêm Công Việc</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>

                
                    <?php if(\Illuminate\Support\Facades\Auth::user()->role != 2): ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu active pcoded-trigger">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                <span class="pcoded-mtext">QUẢN LÝ THÀNH VIÊN</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="active">
                                    <a href="<?php echo e(route('users.index')); ?>">
                                        <span class="pcoded-mtext">Danh Sách Thành viên</span>
                                    </a>
                                </li>
                                <?php if(\Illuminate\Support\Facades\Auth::user()->role == 0): ?>
                                    <li class="active">
                                        <a href="<?php echo e(route('users.create')); ?>">
                                            <span class="pcoded-mtext">Thêm Thành viên</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li class="active">
                                    <a href="<?php echo e(route('positions.index')); ?>">
                                        <span class="pcoded-mtext">Quản lý chức vụ</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    
                    <?php if(\Illuminate\Support\Facades\Auth::user()->role == 0): ?>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu active pcoded-trigger">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                    <span class="pcoded-mtext">PHÒNG BAN</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="active">
                                        <a href="<?php echo e(route('departments.index')); ?>">
                                            <span class="pcoded-mtext">Danh Sách Phòng Ban</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </nav>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">
                            <!-- Report Project -->
                            <?php echo $__env->make('Project.project_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Report Project -->
                            <?php $__env->startSection('content'); ?> <?php echo $__env->yieldSection(); ?>
                        </div>
                    </div>

                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\Project-Management-Laravel\resources\views/sidebar.blade.php ENDPATH**/ ?>