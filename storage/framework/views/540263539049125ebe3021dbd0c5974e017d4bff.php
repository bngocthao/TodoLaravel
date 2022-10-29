
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
                <h2 class="sub-title">CHỈNH SỬA CÔNG VIỆC</h2>
                <form action="<?php echo e(route('tasks.update', $tasks)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên công việc</label>
                        <div class="col-sm-10">
                            <input required name="taskName" type="text" class="form-control" value="<?php echo e($tasks->taskName); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả công việc</label>
                        <div class="col-sm-10">
                            <input required name="description" type="text" class="form-control" value="<?php echo e($tasks->description); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input required name="start_at" type="date" class="form-control" value="<?php echo e($tasks->start_at); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input required name="end_at" type="date" class="form-control" value="<?php echo e($tasks->end_at); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái công việc</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option <?php if($tasks->status == \App\Enums\TaskStatus::On): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::On); ?>">Đang tiến hành</option>
                                <option <?php if($tasks->status == \App\Enums\TaskStatus::Off): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Dừng</option>
                                <option <?php if($tasks->status == \App\Enums\TaskStatus::Complete): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Hoàn tất</option>
                                <option <?php if($tasks->status == \App\Enums\TaskStatus::OnSchedule): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Đúng hạn</option>
                                <option <?php if($tasks->status == \App\Enums\TaskStatus::BehindSchedule): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Trễ hạn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Độ ưu tiên</label>
                        <div class="col-sm-10">
                            <select name="priority" class="form-control">
                                <option <?php if($tasks->priority == \App\Enums\Priority::Low): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\Priority::Low); ?>">Thấp</option>
                                <option <?php if($tasks->priority == \App\Enums\Priority::Medium): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\Priority::Medium); ?>">Trung bình</option>
                                <option <?php if($tasks->priority == \App\Enums\Priority::High): ?> selected <?php endif; ?> value="<?php echo e(\App\Enums\Priority::High); ?>">Cao</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc dự án</label>
                        <div class="col-sm-10">
                            <select name="project_id" class="form-control">
                                <?php $__currentLoopData = $project_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($pj->id == $get_id_project): ?> selected <?php endif; ?> value="<?php echo e($pj->id); ?>"><?php echo e($pj->nameProject); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật công việc</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Script notification -->
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Task/update.blade.php ENDPATH**/ ?>