<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="container">
        <h1 class="text-uppercase mb-5 ml-2"><strong>Editors Dashboard</strong></h1>
    </div>
    
    <div class="row justify-content-center">
    
        <!-- Start row 1 -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card h-100 hover-shadow shadow p-3">
                    <div class="card-header text-uppercase"><strong>Users - <?php echo e($count); ?></strong></div>
                    <div class="card-body">
                        <h1>No of Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>User Categories - <?php echo e($userCount); ?></strong></div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $userTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="capitalize"><?php echo e($item->userType); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Materials - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Materials</h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">PAF</li>
                            <li class="list-group-item">ITPM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row 1 -->
        <hr>

        <!-- Start row 2 -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Users - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Projects - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Projects</h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">PAF</li>
                            <li class="list-group-item">ITPM</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Materials - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Materials</h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">PAF</li>
                            <li class="list-group-item">ITPM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row 2 -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub-dashboard\resources\views/editor/dashboard.blade.php ENDPATH**/ ?>