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
    <div class="card-block">
        <div class="form-group" style="margin-left: 43%; margin-right: 50%">
            <div class="image-cropper">
                <img src="/avatar_upload/<?php echo e($users->avatar); ?>" class="rounded" />
            </div>
        </div>
        <div class="view-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Họ Tên</th>
                                            <td><?php echo e($users->name); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Giới tính</th>
                                            <?php if($users->gender == 0): ?>
                                                <td>Nam</td>
                                            <?php elseif($users->gender == 1): ?>
                                                <td>Nữ</td>
                                            <?php elseif($users->gender == 2): ?>
                                                <td>Khác</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày Gia Nhập</th>
                                            <td><?php echo e($users->dateJoin); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Trạng Thái</th>
                                            <?php if($users->status == '1'): ?>
                                                <td>Active</td>
                                            <?php else: ?>
                                                <td>Deactive</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Địa Chỉ</th>
                                            <td><?php echo e($users->address); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end of table col-lg-6 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><span class="__cf_email__" data-cfemail="4206272f2d02273a232f322e276c212d2f"><?php echo e($users->email); ?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Số Điện Thoại</th>
                                            <td><?php echo e($users->phone); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vai Trò</th>
                                            <?php if($users->role == 0): ?>
                                                <td>Admin</td>
                                            <?php elseif($users->role == 1): ?>
                                                <td>Quản lý</td>
                                            <?php else: ?>
                                                <td>Thành viên</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phòng Ban</th>
                                            <td><?php echo e($users->department->departmentName ?? 'None'); ?></td>
                                        </tr>
                                        <tr>
                                                <th scope="row">Chức Vụ</th>
                                            <td><?php echo e($users->position->positionName ?? 'None'); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end of table col-lg-6 -->
                        </div>
                        <!-- end of row -->
                    </div>
                    <!-- end of general info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of view-info -->
        <div class="edit-info" style="display: none;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                <input type="text" class="form-control" placeholder="Full Name">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-radio">
                                                <div class="group-add-on">
                                                    <div class="radio radiofill radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" checked=""><i class="helper"></i> Male
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio"><i class="helper"></i> Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input id="dropper-default" class="form-control" type="text" placeholder="Select Your Birth Date">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select id="hello-single" class="form-control">
                                                <option value="">---- Marital Status ----</option>
                                                <option value="married">Married</option>
                                                <option value="unmarried">Unmarried</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-location-pin"></i></span>
                                                <input type="text" class="form-control" placeholder="Address">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end of table col-lg-6 -->
                            <div class="col-lg-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                                <input type="text" class="form-control" placeholder="Mobile Number">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-social-twitter"></i></span>
                                                <input type="text" class="form-control" placeholder="Twitter Id">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Twitter Id">
                    </div>
                </td>
            </tr> -->
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-social-skype"></i></span>
                                                <input type="email" class="form-control" placeholder="Skype Id">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-earth"></i></span>
                                                <input type="text" class="form-control" placeholder="website">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end of table col-lg-6 -->
                        </div>
                        <!-- end of row -->
                        <div class="text-center">
                            <a href="#!" class="btn btn-primary waves-effect waves-light m-r-20">Save</a>
                            <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                        </div>
                    </div>
                    <!-- end of edit info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of edit-info -->
    </div>

<?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/User/detail.blade.php ENDPATH**/ ?>