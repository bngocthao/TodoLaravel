
<?php $__env->startSection('content'); ?>

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-weight: bold">DANH SÁCH CÔNG VIỆC</h3>
                        <span>Hiển thị chi tiết các công việc trong những dự án khác nhau</span>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;"></th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Tên công việc</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Mô tả công việc</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 84.5px;">Ngày bắt đầu</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 30px;">Ngày kết thúc</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 73px;">Trạng thái</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Độ ưu tiên</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $task_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">

                                                        <div class="form-check col-lg">


                                                            <input class="form-check-input col-lg float-end" type="checkbox" id="flexCheckIndeterminate"
                                                                   onchange="alert(this.checked); if(this.checked) this.value='true'; else this.value='false';">



                                                        </div>
                                                    </td>
                                                    <td class="sorting_1"><?php echo e($item->taskName); ?></td>
                                                    <td><?php echo $item -> description; ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::parse($item -> start_at)->format('d/m/Y')); ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::parse($item -> end_at)->format('d/m/Y')); ?></td>
                                                <?php if($item->status == \App\Enums\TaskStatus::On): ?>
                                                        <td>
                                                            <span class="badge bg-success">Đang mở</span>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>
                                                            <span class="badge bg-danger">Đang đóng</span>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if($item->priority == \App\Enums\Priority::Low): ?>
                                                        <td>
                                                            <span class="badge bg-info">Thấp</span>
                                                        </td>
                                                    <?php elseif($item->priority == \App\Enums\Priority::Medium): ?>
                                                        <td>
                                                            <span class="badge bg-warning">Trung bình</span>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>
                                                            <span class="badge bg-danger">Cao</span>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <!-- Example single danger button -->
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?php echo e(route('tasks.show', $item)); ?>">Chi tiết</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('tasks.edit', $item)); ?>">Chỉnh sửa</a>
                                                                <form method="POST" action=" <?php echo e(route('tasks.destroy', $item)); ?>">
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

    <script>

    </script>
    <?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Task/list.blade.php ENDPATH**/ ?>