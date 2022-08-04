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
                <h4 class="sub-title">TẠO MỚI TÀI KHOẢN</h4>
                <form action="<?php echo e(route('users.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã tài khoản</label>
                        <div class="col-sm-10">
                            <input required name="userCode" type="text" class="form-control" value="<?php echo e($accountCode); ?>" style="color: red; font-weight: bold">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-10">
                            <input required name="name" type="text" class="form-control" placeholder="Họ và tên">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính </label>
                        <div class="col-sm-10">
                            <select name="gender" class="form-control">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                                <option value="2">Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input required name="address" type="text" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email tài khoản</label>
                        <div class="col-sm-10">
                            <input required name="email" type="text" class="form-control" placeholder="Email được cấp">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input required name="password" type="password" class="form-control" min="5" placeholder="Nhập mật khẩu">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input required name="phone" type="number" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày tham gia</label>
                        <div class="col-sm-10">
                            <input required name="dateJoin" type="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Vai trò <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="department_id" class="form-control">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->role); ?>"><?php echo e($item->role); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc phòng ban <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="department_id" class="form-control">
                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->departmentName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chức vụ người dùng <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="position_id" class="form-control">
                                <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->positionName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-form-label">Ảnh đại diện</label>
                        <input class="form-group" type="file" name="avatar_upload">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái tài khoản</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="1">Kích hoạt</option>
                                <option value="2">Tạm ẩm</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Thêm tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/User/create.blade.php ENDPATH**/ ?>