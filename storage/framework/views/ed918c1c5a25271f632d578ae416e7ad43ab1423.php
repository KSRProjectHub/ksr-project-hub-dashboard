

<?php $__env->startSection('content'); ?>
<h2 class="container mb-3 justify-content-center">Admin Settings</h2>
<div class="container mb-3">
    <div class="row bg-light rounded mb-0">
        <h6 class="p-4 mb-4">Logging Session Details</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">Login Time</th>
                        <th scope="col">Logout Time</th>
                        <th scope="col">Device</th>
                        <th scope="col">Browser</th>
                        <th scope="col">Operating System</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $userloginsessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $loginsession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($userloginsessions->firstItem() + $key); ?></th>
                            <td><?php echo e($loginsession->last_login_ip); ?></td>
                            <td><?php echo e($loginsession->created_at); ?></td>
                            <td><?php echo e($loginsession->updated_at); ?></td>
                            <td><?php echo e($loginsession->device); ?></td>
                            <td><?php echo e($loginsession->browser); ?></td>
                            <td><?php echo e($loginsession->operating_system); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="row justify-content-between">
                <div class="col-5 justify-content-start">
                    Showing <?php echo e($userloginsessions->firstItem()); ?> - <?php echo e($userloginsessions->lastItem()); ?> of <?php echo e($userloginsessions->total()); ?>

                </div>
                <div class="col-7 justify-content-end">
                    <?php echo e($userloginsessions->onEachSide(1)->links()); ?>

                </div>
            </div>
        </div>        
    </div>
</div>


<div class="container mb-3">
    
    <div class="row">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Reset Password</h6>
            <form action="<?php echo e(route('update.password')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group mb-3">
                    <input type="password" id="old-password" name="oldPassword" class="form-control <?php $__errorArgs = ['oldPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Old Password">                    

                    <script>
                        $(function() {
                          $('#old-password').password()
                        })
                      </script>
                
                    <?php $__errorArgs = ['oldPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    
                </div>

                <div class="input-group mb-3">
                    <input type="password" id="password" name="new_password" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  data-toggle="password"
                        placeholder="New Password">                    


                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="new_password_confirmation" class="form-control <?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Confirm New Password" data-toggle="password">
                        
                    <?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                            <?php echo e(__('Update Password')); ?>

                        </button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-primary py-3 w-100 mb-4">
                            <?php echo e(__('Reset')); ?>

                        </button>                        
                    </div>
                </div>
                 
            </form>
        </div>
    </div>  
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/admin/settings.blade.php ENDPATH**/ ?>