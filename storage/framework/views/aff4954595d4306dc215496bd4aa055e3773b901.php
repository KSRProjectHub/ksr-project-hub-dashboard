<?php $__env->startSection('content'); ?>

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4 mb-3">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Registered Users</p>
                            <h6 class="mb-0"><?php echo e($count); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Sale</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Today Revenue</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Revenue</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->

        <p>Device Type - <?php echo e(Browser::deviceType()); ?></p>
        <p>Browser - <?php echo e(Browser::browserName()); ?> <?php echo e(Browser::isEdge()); ?></p>
        <p>OS - <?php echo e(Browser::platformName()); ?></p>
        <p>OS Family - <?php echo e(Browser::platformFamily()); ?></p>
        <p>Browser Engine - <?php echo e(Browser::browserEngine()); ?> <?php echo e(Browser::platformVersionPatch()); ?></p>
        <p>User Agent - <?php echo e(Browser::userAgent()); ?></p>
        <p>Device Family - <?php echo e(Browser::deviceFamily()); ?></p>
        <p>Browser - <?php echo e(Browser::isFirefox()); ?></p>
        

            
        

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>