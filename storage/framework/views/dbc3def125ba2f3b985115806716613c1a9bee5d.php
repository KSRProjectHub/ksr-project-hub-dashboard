

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="container m-3 px-4 pt-2 h-25">
        <div class="row g-4 border px-2 w-100 rounded">
            <h3><?php echo e(__('Users')); ?></h3>
            <div class="row mb-3 justify-content-start">
                <div class="btn-group w-50" role="group">
                    <a href="<?php echo e(route('admin.users')); ?>" type="button" class="btn btn-outline-primary col-4"><i class="fa fa-list"></i></a>
                    <a href="<?php echo e(route('admin.usersGrid')); ?>" type="button" class="btn btn-outline-primary col-4 <?php echo e((request()->is('admin/usersGrid')) ? 'active' : ''); ?>"><i class="bi-grid-3x3-gap-fill ms-2"></i></a>                    
                </div>

            </div>
            
        </div>
        
    </div> 
    <div class="row bg-primary p-2 mb-3">
        <div class="container">

            <div class="bg-light rounded h-100 p-4">
                <div class="row staff-grid-row">
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget">
                                <div class="profile-img">
                                    <a href="profile.html" class="avatar"><img  class="rounded-circle" src="<?php echo e(asset('img/user.jpg')); ?>" style="width: 60px; height: 60px;"  alt=""></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i style="color: gray" class="fa-solid fa-ellipsis-vertical me-2"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html"><?php echo e($item->name); ?></a></h4>
                                <div class="small text-muted uppercase"><?php echo e($item->userType); ?></div>
                                <div class="small text-muted"><?php echo e($item->created_at); ?></div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub-dashboard\resources\views/admin/usersGrid.blade.php ENDPATH**/ ?>