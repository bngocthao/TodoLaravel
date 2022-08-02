
<?php $__env->startSection('content'); ?>

<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Ảnh</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Họ tên</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Giới tính</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 84.5px;">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 30px;">Địa chỉ</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 73px;">Vai trò</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Nhóm</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"></td>
                                                    <td><?php echo e($item->name); ?></td>
                                                    <td><?php echo e($item->gender); ?></td>
                                                    <td><?php echo e($item->email); ?></td>
                                                    <td><?php echo e($item->address ?? 'None'); ?></td>
                                                    <td><?php echo e($item->position_id ?? 'None'); ?></td>
                                                    <td><?php echo e($item->group_belong ?? 'None'); ?></td>
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

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\CODE\Working\TodoLaravel\resources\views/User/list.blade.php ENDPATH**/ ?>