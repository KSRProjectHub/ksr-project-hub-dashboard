

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit <?php echo e($userType->userType); ?>

                </div>
                <div class="card-body">

                    <!-- 
                    <?php if(Session::has('user_type_updated')): ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo e(Session::get('user_type_updated')); ?>

                        </div>
                    <?php endif; ?>
                    -->
                    <form action="<?php echo e(route('update.userTypes')); ?>" class="p-3" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" class="form-control" id="userTypeId" name="id" value="<?php echo e($userType->id); ?>">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8 mb-3">
                                <input type="text" class="form-control" id="updateUserType" value="<?php echo e($userType->userType); ?>" name="userType">
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Save Changes')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub\resources\views/users/edit-userType.blade.php ENDPATH**/ ?>