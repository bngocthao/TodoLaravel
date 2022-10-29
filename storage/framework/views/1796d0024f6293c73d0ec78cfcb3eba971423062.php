
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
                <h4 class="sub-title">CHỈNH SỬA DỰ ÁN</h4>
                <form action="/projects/<?php echo e($project->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên dự án</label>
                        <div class="col-sm-10">
                            <input required name="nameProject" type="text" class="form-control" value="<?php echo e($project->nameProject); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả dự án</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input min="<?php echo e($today); ?>" required name="start_at" type="date" class="form-control" value="<?php echo e($project->start_at); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input min="<?php echo e($today); ?>" name="end_at" type="date" class="form-control" value="<?php echo e($project->end_at); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option <?php if($project->status == \App\Enums\ProjectStatus::On): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\ProjectStatus::On); ?>">On</option>
                                <option <?php if($project->status == \App\Enums\ProjectStatus::Off): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\ProjectStatus::Off); ?>">Off</option>
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người quản lý</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($u->id == $get_id_user): ?> selected <?php endif; ?> value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <style>
                        .select2-selection__choice{
                            background: deepskyblue!important;
                        }
                    </style>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thành viên</label>
                        <!-- Hiển thị thành viên đã được thêm và những thành viên chưa được thêm -->
                        <div class="col-sm-10">
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($usr->role == 2): ?>
                                        <?php $__currentLoopData = $pUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ePUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($usr->id == $ePUser->user_id && $ePUser->project_id == $project->id): ?>
                                                <option value="<?php echo e($usr->id); ?>" selected><?php echo e($usr->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Project/update.blade.php ENDPATH**/ ?>