<!-- Script notification -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        <?php if(Session::has('error')): ?>
            toastr.error('<?php echo e(Session::get('error')); ?>');
        <?php elseif(Session::has('warning')): ?>
            toastr.warning('<?php echo e(Session::get('error')); ?>');
        <?php elseif(Session::has('success')): ?>
            toastr.success('<?php echo e(Session::get('success')); ?>');
        <?php endif; ?>
    });
</script>
<?php /**PATH E:\CODE\Working\TodoLaravel\resources\views/Notification.blade.php ENDPATH**/ ?>