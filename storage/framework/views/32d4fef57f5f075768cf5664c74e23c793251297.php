<?php $__env->startSection('content'); ?>
    <style>
        .image-cropper {
            width: 200px;
            height: 200px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }
        img {
            display: inline;
            margin: 0 auto;
            height: 100%;
            width: auto;
        }
    </style>
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>

            <div class="card-block">
                <div class="form-group" style="margin-left: 43%; margin-right: 50%">
                    <div class="image-cropper">
                        <img src="/avatar_upload/<?php echo e($users->avatar); ?>" class="rounded" />
                    </div>
                </div>
                <h6 style="margin-left: 44%">
                    <span style="font-size: 15px" class="badge bg-info"><?php echo e($users->position->positionName ?? 'None'); ?></span>  <?php echo e($users->name); ?></h6><br>
                <h4 class="sub-title">CẬP NHẬT THÔNG TIN TÀI KHOẢN</h4>
                <form action="<?php echo e(route('users.update', $users)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input hidden name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã tài khoản</label>
                        <div class="col-sm-10">
                            <?php if($users->userCode == ''): ?>
                                <input required name="userCode" type="text" class="form-control" value="<?php echo e($accountCode); ?>" style="color: red; font-weight: bold">
                            <?php else: ?>
                                <input required name="userCode" type="text" class="form-control" value="<?php echo e($users->userCode); ?>" style="color: red; font-weight: bold">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-10">
                            <input required name="name" type="text" class="form-control" value="<?php echo e($users->name); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính </label>
                        <div class="col-sm-10">
                            <select name="gender" class="form-control">
                                <option <?php if($users -> gender == 1): ?> selected <?php endif; ?> value="1">Nam</option>
                                <option <?php if($users -> gender == 2): ?> selected <?php endif; ?> value="2">Nữ</option>
                                <option <?php if($users -> gender == 3): ?> selected <?php endif; ?> value="3">Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input required name="address" type="text" class="form-control"value="<?php echo e($users->address); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email tài khoản</label>
                        <div class="col-sm-10">
                            <input required name="email" type="text" class="form-control" value="<?php echo e($users->email); ?>">
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                        <label class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input required name="password" type="text" class="form-control" min="5" value="<?php echo e($users->password); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input required name="phone" type="number" class="form-control" value="<?php echo e($users->phone); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày tham gia</label>
                        <div class="col-sm-10">
                            <input required name="dateJoin" type="date" class="form-control" value="<?php echo e($users->dateJoin); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc phòng ban <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="department_id" class="form-control">
                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($item->id == $get_id_dp): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->departmentName ?? 'None'); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chức vụ người dùng <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="position_id" class="form-control">
                                <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($item->id == $get_id_ps): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->positionName ?? 'None'); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh đại diện (Không bắt buộc)</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="avatar_upload" accept="image/*">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái tài khoản</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option <?php if($users->status == 1): ?> selected <?php endif; ?> value="1">Kích hoạt</option>
                                <option <?php if($users->status == 2): ?> selected <?php endif; ?> value="2">Tạm ẩm</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\CODE\Working\TodoLaravel\resources\views/User/update.blade.php ENDPATH**/ ?>