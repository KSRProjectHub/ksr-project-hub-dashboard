

<?php $__env->startSection('content'); ?>
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('userterms.index')); ?>">Terms and Conditions</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('V')); ?><?php echo e($term->version); ?></li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container-fluid bg-light vh-100 p-5">
    <?php echo $term->editor; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/termsandconds/viewterm.blade.php ENDPATH**/ ?>