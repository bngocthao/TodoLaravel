<?php $__env->startSection('content'); ?>

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-header">
                        <h2>Danh sách tài khoản <a href="<?php echo e(route('users.create')); ?>" class="btn btn-danger">Thêm mới tài khoản</a></h2>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">#</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Mã tài khoản</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Họ và tện</th>

                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 30px;">Phòng ban</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 73px;">Chức vụ</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Trạng thái tài khoản</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center">
                                                        <span class="media-left media-middle" href="#">
                                                            <img style="max-width: 100px" class="img-radius" src="/avatar_upload/<?php echo e($item->avatar); ?>" alt="Chưa có ảnh đại diện">
                                                        </span>
                                                    </td>
                                                    <td><?php echo e($item->userCode); ?></td>
                                                    <td><?php echo e($item->name); ?></td>
                                                    <td><?php echo e($item->department->departmentName ?? 'None'); ?></td>
                                                    <td><?php echo e($item->position->positionName ?? 'None'); ?></td>
                                                    <?php if($item->status == 1): ?>
                                                        <td><span class="btn btn-success">Đã kích hoạt</span></td>
                                                    <?php else: ?>
                                                        <td><span class="btn btn-danger">Đã khóa</span></td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <!-- Example single danger button -->
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?php echo e(route('users.show', $item)); ?>">Chi tiết</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('users.edit', $item)); ?>">Chỉnh sửa</a>
                                                                <form method="POST" action=" <?php echo e(route('users.destroy', $item)); ?>">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button class="btn dropdown-item" type="submit" onclick="return confirm('Xác nhận xóa ?')">Xóa</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/User/list.blade.php ENDPATH**/ ?>