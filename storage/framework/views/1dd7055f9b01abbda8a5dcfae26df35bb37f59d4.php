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
                <h4 class="sub-title">THÊM PHÒNG BAN</h4>
                <form action="<?php echo e(route('departments.update', $departments)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã phòng ban</label>
                        <div class="col-sm-10">
                            <input required name="departmentCode" type="text" style="font-weight: bold; color: red" class="form-control" value="<?php echo e($departments->departmentCode); ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên phòng ban</label>
                        <div class="col-sm-10">
                            <input required name="departmentName" type="text" class="form-control" value="<?php echo e($departments->departmentName); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thông tin phòng ban</label>
                        <div class="col-sm-10">

                                <textarea class="ckeditor form-control" id="editor" name="departmentDes" ><?php echo $departments->departmentDes; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số lượng thành viên</label>
                        <div class="col-sm-10">
                            <input required name="slotAccount" type="number" class="form-control" value="<?php echo e($departments->slotAccount); ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quản lý phòng</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-control">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($i->role == '2'): ?>
                                        <option value="<?php echo e($i->id); ?>"><?php echo e($i->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'ckeditor', {
            filebrowserUploadUrl: "<?php echo e(route('departments.store', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Department/update.blade.php ENDPATH**/ ?>