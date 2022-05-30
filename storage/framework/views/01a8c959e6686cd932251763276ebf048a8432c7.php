

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Profile Image</h4>
                <div class="align-items-center ms-2">
                    <div class="position-relative mb-3">

                        <?php if(Auth::user()->profileimage == null): ?>
                            <?php if(Auth::user()->gender == 'm'): ?>
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 200px; height: 200px;">
                            <?php elseif(Auth::user()->gender == 'f'): ?>
                                <img class="rounded-circle mx-auto d-block image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 200px; height: 200px;">
                            <?php endif; ?>                    
                        <?php else: ?>
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" <?php echo e(asset('img/user-images/' . Auth::user()->profileimage  )); ?>" alt="" style="width: 200px; height: 200px;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="_userAvatarFile">Upload image</label>
                    <input type="file" class="form-control" name="_userAvatarFile" id="_userAvatarFile">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="bg-light rounded h-100 p-4">

            </div>        
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub-dashboard\resources\views/admin/profile.blade.php ENDPATH**/ ?>