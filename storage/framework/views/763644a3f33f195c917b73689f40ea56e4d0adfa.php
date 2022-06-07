

<?php $__env->startSection('content'); ?>
<!-- 403 Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-4">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1 fw-bold">403</h1>
            <h1 class="mb-4">Oops!</h1>
            <p class="mb-4">Your Not Authorize</p>
            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Go Back To Home</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/errors/403.blade.php ENDPATH**/ ?>