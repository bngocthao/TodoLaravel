
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
                <h4 class="sub-title">CHỈNH SỬA VỤ MỚI</h4>
                <form action="<?php echo e(route('positions.update', $positions)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="postionCode" type="text" class="form-control" style="font-weight: bold; color: red" value="<?php echo e($positions->postionCode); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="positionName" type="text" class="form-control" value="<?php echo e($positions->positionName); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả chức vụ</label>
                        <div class="col-sm-10">
                            <input name="positionDes" type="text" class="form-control" value="<?php echo e($positions->positionDes); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái chức vụ</label>
                        <div class="col-sm-10">
                            <select name="positionStatus" class="form-control">
                                <option <?php if($positions->positionStatus == \App\Enums\TaskStatus::On): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::On); ?>">On</option>
                                <option <?php if($positions->positionStatus == \App\Enums\TaskStatus::Off): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật chức vụ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Position/update.blade.php ENDPATH**/ ?>