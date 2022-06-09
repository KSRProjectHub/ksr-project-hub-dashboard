

<?php $__env->startSection('content'); ?>
<div class="container mb-3">
    <h4><?php echo e($user->getUserType()); ?> <?php echo e($user->fname.' '.$user->lname); ?></h4>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="bg-light rounded h-100 p-4">
                <div class="align-items-center ms-2">
                    <div class="position-relative mb-3">

                        <?php if($user->profileimage == null): ?>
                            <?php if($user->gender == 'm'): ?>
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 200px; height: 200px;">
                            <?php elseif($user->gender == 'f'): ?>
                                <img class="rounded-circle mx-auto d-block image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 200px; height: 200px;">
                            <?php endif; ?>                    
                        <?php else: ?>
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" <?php echo e(asset('img/user-images/' . $user->profileimage  )); ?>" alt="" style="width: 200px; height: 200px;">
                        <?php endif; ?>
                    </div>
                </div>
                <hr>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <p><strong><?php echo e(__('Registered Date')); ?></strong></p>
                            <p><strong><?php echo e(__('Last Updated')); ?></strong></p>
                        </div>
                        <div class="col-8">
                            <?php echo e($user->created_at->diffForHumans()); ?> (<?php echo e(date_format($user->created_at,'d M Y')); ?> - <?php echo e($user->created_at->format('h:i:s A')); ?>)</p>
                            <?php echo e($user->updated_at->diffForHumans()); ?> <?php echo e(date_format($user->updated_at,'d M Y')); ?>

                        </div>
                    </div>
                    
                    <!-- <p></p> -->
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Personal Details</h4><hr>

                <p>
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-user me-2 fa-stack-1x"></i>
                    </span>
                   <?php echo e($user->title); ?> <?php echo e($user->fname.' '.$user->lname); ?> (<?php echo e($user->fullname); ?>)<br>
 
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-mobile-screen me-2 fa-stack-1x"></i>
                    </span>
                    <?php echo e($user->contactNo); ?><br>
                    
                    <?php if($user->gender == 'f'): ?>
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-venus me-2 fa-stack-1x"></i>
                        </span>
                        Female
                    <?php elseif($user->gender == 'm'): ?>
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">    
                            <i class="fa fa-mars me-2 fa-stack-1x"></i>
                        </span>   
                        Male
                    <?php endif; ?><br>
                        
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-location-dot me-2 fa-stack-1x"></i>
                    </span>
                    <?php echo e($user->address); ?><br>

                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-at me-2 fa-stack-1x"></i>
                    </span>
                   <a href="<?php echo e($user->email); ?>"> <?php echo e($user->email); ?></a><br>
 
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-cake-candles me-2 fa-stack-1x"></i>
                    </span>
                    <?php echo e($user->dob); ?><br>

                    <?php if($user->marital_status == "Single"): ?>
                        <?php if($user->gender == 'f'): ?>
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-person-dress-simple me-2 fa-stack-1x"></i>
                            </span>
                        <?php elseif($user->gender == 'm'): ?>
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">    
                                <i class="fa fa-person me-2 fa-stack-1x"></i>
                            </span> 
                        <?php endif; ?>
                    <?php elseif($user->marital_status == "Married"): ?>
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-person"></i>
                            <i class="fa fa-person-dress-simple"></i>
                        </span>                        
                    <?php elseif($user->marital_status == "Engaged"): ?>
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-ring me-2 fa-stack-1x"></i>
                        </span>
                        
                    <?php endif; ?>
                    <?php echo e($user->marital_status); ?>

                </p>                 
            </div>        
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/users/viewUser.blade.php ENDPATH**/ ?>