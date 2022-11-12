
<?php $__env->startSection('content'); ?>
    <style>
        form .error {
            color: #ff0000;
        }
    </style>

    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
                <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary loat-right btn-round"> Thêm mới công việc</a>
            </div>

            <div class="card-block">
                
                <?php if(count($errors) > 0): ?>
                    <ul class="alert alert-danger pl-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <h4 class="sub-title">THÊM MỚI DỰ ÁN</h4>
                <form action="<?php echo e(route('projects.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên dự án</label>
                        <div class="col-sm-10">
                            <input required name="nameProject" type="text" class="form-control" id="search" placeholder="Điền tên dự án">
                            <span id="error_name"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh (nếu có)</label>
                        <div class="col-sm-10">
                            <input class="form-group" type="file" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả dự án</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="editor" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input min="<?php echo e($today); ?>" name="start_at" type="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input min="<?php echo e($today); ?>" name="end_at" type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="<?php echo e(\App\Enums\ProjectStatus::On); ?>">On</option>
                                <option value="<?php echo e(\App\Enums\ProjectStatus::Off); ?>">Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người quản lý</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
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
                        <label class="col-sm-2 col-form-label">Thành viên</label>
                        <div class="col-sm-10">
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                <?php $__currentLoopData = $empU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($usr->project_id == ''): ?>
                                        <?php if($usr->role == 2): ?>
                                            <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->name); ?></option>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="btn_confirm" class="btn btn-info float-right btn-round">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function (){
           $('#search').blur(function (){
             var err_name = '';
             var nameProject = $('#search').val();
             var _token = $('input[name="_token"]').val();

             if(nameProject == '')
             {
                $('#error').addClass('has-error');
                $('#error_name').html('<lable class="text-danger">Tên dự án đang trống</lable>')
             }else{
                $.ajax({
                   url: "<?php echo e(route('project.checkName')); ?>",
                   method: "POST",
                   data: {nameProject: nameProject, _token: _token},
                   success:function (result)
                   {
                       if(result == 'unique')
                       {
                           $('#error_name').html('<lable class="text-success">Tên hợp lệ</lable>');
                           $('#search').removeClass('has-error');
                           $('#btn_confirm').attr('disabled', false)
                       }else{
                           $('#error_name').html('<lable class="text-danger">Đã tồn tại</lable>');
                           $('#search').addClass('has-error');
                           $('#btn_confirm').attr('disabled', 'disabled')
                       }
                   }
                });
             }

           });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Project/create.blade.php ENDPATH**/ ?>