
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

                <?php if(count($errors) > 0): ?>
                    <ul class="alert alert-danger pl-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <h4 class="sub-title">THÊM CÔNG VIỆC MỚI</h4>
                <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên công việc</label>
                        <div class="col-sm-10">
                            <input required name="taskName" type="text" class="form-control" placeholder="Điền tên công việc">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả công việc</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control" id="editor" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input required name="start_at" min="<?php echo e($today); ?>" type="date" id="#dropper-animation" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input required name="end_at" type="date" id="#dropper-animation" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái công việc</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="<?php echo e(\App\Enums\TaskStatus::On); ?>">On</option>
                                <option value="<?php echo e(\App\Enums\TaskStatus::Off); ?>">Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Độ ưu tiên</label>
                        <div class="col-sm-10">
                            <select name="priority" class="form-control">
                                <option value="<?php echo e(\App\Enums\Priority::Low); ?>">Thấp</option>
                                <option value="<?php echo e(\App\Enums\Priority::Medium); ?>">Trung bình</option>
                                <option value="<?php echo e(\App\Enums\Priority::High); ?>">Cao</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc dự án</label>
                        <div class="col-sm-10">
                            <select name="project->project_id" class="form-control">
                                <?php $__currentLoopData = $project_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pj->id); ?>"><?php echo e($pj->nameProject); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <style>
                        .select2-selection__choice{
                            background: deepskyblue!important;
                        }
                    </style>
                    <!-- Hiển thị thành viên có vai trò là nhân viên -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thành viên tham gia</label>
                        <div class="col-sm-10">
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($usr->role == 2): ?>
                                        <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Thêm công việc</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Task/create.blade.php ENDPATH**/ ?>