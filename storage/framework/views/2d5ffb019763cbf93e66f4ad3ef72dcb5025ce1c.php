
<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        Công việc thuộc <span class="badge bg-success"> <?php echo e($projectsName->nameProject); ?> </span> hiện tại bao gồm:<br> - <?php echo e($pj->taskName); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project-Management-Laravel\resources\views/Project/project_detail.blade.php ENDPATH**/ ?>