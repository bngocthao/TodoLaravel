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
                <h4 class="sub-title">THÊM CHỨC VỤ MỚI</h4>
                <form action="<?php echo e(route('positions.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="postionCode" type="text" class="form-control" style="font-weight: bold; color: red" value="cv_<?php echo e($randomCode); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="positionName" type="text" class="form-control" placeholder="Tên chức vụ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="positionDes" type="text" class="form-control" placeholder="Mô tả chức vụ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái chức vụ</label>
                        <div class="col-sm-10">
                            <select name="positionStatus" class="form-control">
                                <option value="<?php echo e(\App\Enums\TaskStatus::On); ?>">On</option>
                                <option value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Thêm chúc vụ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\CODE\Working\TodoLaravel\resources\views/Position/create.blade.php ENDPATH**/ ?>