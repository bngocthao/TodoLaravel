
<?php $__env->startSection('content'); ?>
    <div class="page-body">
        <div class="row">
            <!-- Task-detail-right start -->
            <div class="col-xl-4 col-lg-12 push-xl-8 task-detail-right">



















                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text"><i class="icofont icofont-ui-note m-r-10"></i> Chi tiết công việc</h5>
                    </div>
                    <div class="card-block task-details">
                        <table class="table table-border table-xs">
                            <tbody>
                            <tr>
                                <td><i class="icofont icofont-contrast"></i> Thuộc dự án:</td>
                                <td class="text-right"><span class="f-right"><?php echo e($task->project_info->nameProject); ?></span></td>
                            </tr>
                            <tr>
                                <td><i class="icofont icofont-meeting-add"></i> Ngày bắt đầu:</td>
                                <td class="text-right"><?php echo e(date('d-m-y', $task->started_at)); ?></td>

                            </tr>
                            <tr>
                                <td><i class="icofont icofont-id-card"></i> Ngày kết thúc:</td>
                                <td class="text-right"><?php echo e(date('d-m-y', strtotime($task->end_at))); ?></td>
                            </tr>
                            <tr>
                                <td><i class="icofont icofont-spinner-alt-5"></i> Mức độ ưu tiên:</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                            <?php if($task->priority == '1'): ?>
                                            <i class="icofont icofont-upload m-r-5"></i>Thấp
                                            <?php elseif($task->priority == '2'): ?>
                                                <i class="icofont icofont-upload m-r-5"></i>Trung bình
                                            <?php else: ?>
                                                <i class="icofont icofont-upload m-r-5"></i>Cao
                                            <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="icofont icofont-washing-machine"></i> Trạng thái:</td>
                                <?php if($task->status == '1'): ?>
                                    <td class="text-right">Đang tiến hành</td>
                                <?php elseif($task->status == '2'): ?>
                                    <td class="text-right">Dừng</td>
                                <?php elseif($task->status == '3'): ?>
                                    <td class="text-right">Hoàn tất</td>
                                <?php elseif($task->status == '4'): ?>
                                    <td class="text-right">Đúng hạn</td>
                                <?php else: ?>
                                    <td class="text-right">Trễ hạn</td>
                                <?php endif; ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div>
                                                            <span>
                                  <a href="#!" class="text-muted m-r-10 f-16"><i class="icofont icofont-random"></i> </a>
                                </span>
                            <span class="m-r-10">
                                   <a href="#!" class="text-muted f-16"><i class="icofont icofont-options"></i></a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Task-detail-right start -->
            <!-- Task-detail-left start -->
            <div class="col-xl-8 col-lg-12 pull-xl-4">
                <div class="card">




                    <div class="card-block">
                        <div class="">
                            <div class="m-b-20">
                                <h6 class="sub-title m-b-15">Mô tả</h6>
                                <p>
                                    <?php echo $task->description; ?>

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="f-left">
                                    <span class=" txt-primary"> <i class="icofont icofont-chart-line-alt"></i>
                                Trạng thái công việc:</span>
                            <div class=" d-inline-block">
                                <?php if($task->status == '1'): ?>
                                <p><b>Đang tiến hành</b></p>
                                <?php endif; ?>

                                <!-- end of dropdown menu -->
                            </div>






















































                    </div>
                </div>

            </div>
            <!-- Task-detail-left end -->
        </div>
    </div>
<?php echo $__env->make('Notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Task/task_detail.blade.php ENDPATH**/ ?>