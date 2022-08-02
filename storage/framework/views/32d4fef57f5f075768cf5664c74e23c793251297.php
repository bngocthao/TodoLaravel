
<?php $__env->startSection('content'); ?>

    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <div class="card-block">
                <h4 class="sub-title">CHỈNH SỬA THÀNH VIÊN</h4>
                <form action="<?php echo e(route('users.update', $user_pj[0]->user_id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Họ tên</label>
                        <div class="col-sm-10">
                            <input required name="name" type="text" class="form-control" value="<?php echo e($user_pj[0]->name); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính</label>
                        <div class="col-sm-10">
                            <select name="gender" class="form-control">
                                <option <?php if($user_pj[0]->gender == \App\Enums\Gender::Man): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\Gender::Man); ?>">Nam</option>
                                <option <?php if($user_pj[0]->gender == \App\Enums\Gender::Woman): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\Gender::Woman); ?>">Nữ</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input required name="email" type="text" class="form-control" value="<?php echo e($user_pj[0]->email); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input name="address" type="text" class="form-control" value="<?php echo e($user_pj[0]->address); ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Vai trò</label>
                        <div class="col-sm-10">
                            <select name="position_id" class="form-control">
                                <option <?php if($user_pj[0]->position_id == \App\Enums\UserRole::Emp): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\UserRole::Emp); ?>">Thành viên</option>
                                <option <?php if($user_pj[0]->position_id == \App\Enums\UserRole::Manager): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\UserRole::Manager); ?>">Quản lý</option>




                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nhóm</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control">



                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh đại diện</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control">
                                
                                
                                
                            </select>
                        </div>
                    </div>

                    <div  class="d-flex">
                        <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>
                        &nbsp;&nbsp;<a href="<?php echo e(route('projects.index')); ?>" class="btn btn-warning float-right btn-round">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\CODE\Working\TodoLaravel\resources\views/User/update.blade.php ENDPATH**/ ?>