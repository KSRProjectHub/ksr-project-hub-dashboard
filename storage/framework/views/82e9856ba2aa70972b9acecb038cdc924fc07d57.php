

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row mb-3 p-3">
        <div class="container">
            <div class="row">

                <div class="col-4">
                    <h1 class="mt-3 mb-3">User Roles</h1>
                </div>

                <div class="col-8 d-flex justify-content-end">

                    <form action="<?php echo e(route('add.userTypes')); ?>" class="p-3" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Add New Role" class="form-control <?php $__errorArgs = ['userType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="addUserType" name="userType" >
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success"><?php echo e(__('Add New Role')); ?></button>
                            </div>
                        </div>
                        
                        <?php $__errorArgs = ['userType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        
                    </form>

                </div>
            </div>

            <div class="row">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($userTypeCount== 0): ?>
                            <?php echo e(__('No Entries Found')); ?>

                        <?php else: ?>
                            <?php $__currentLoopData = $uTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->userType); ?></td>
                                    <td>
                                        <a href="users/edit-userType/<?php echo e($item->id); ?>" type="button" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                                        <a href="deleteUserType/<?php echo e($item->id); ?>" type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div class="container mb-3 pt-3">

        <div class="container">
            <div class="row">
                <div class="col"><h1>Users</h1> </div>
                <div class="col text-md-end">
                    <a href="<?php echo e(url('/admin')); ?>" type="button" class="btn btn-success"><?php echo e(__('Add New')); ?></a>
                </div>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($userCount== 0): ?>
                        <tr>
                            <td><?php echo e(__('No Entries Found')); ?></td>
                        </tr>
                    <?php else: ?>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->userType); ?></td>
                                <td>
                                    <a href="users/editUser/<?php echo e($item->id); ?>" type="button" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                                    <a href="deleteUser/<?php echo e($item->id); ?>" type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub\resources\views/users.blade.php ENDPATH**/ ?>