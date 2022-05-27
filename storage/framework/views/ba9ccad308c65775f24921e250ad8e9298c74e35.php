

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row bg-primary p-2 mb-3">
        <div class="container">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-6">
                        <h6 class="justify-content-start">Users</h6>
                    </div>
                    <div class="col-6">
                        <form method="GET" action="<?php echo e(route('admin.search')); ?>" class="d-flex mb-2 justify-content-end">
                            <?php echo csrf_field(); ?>
                            <input class="form-control border-1 w-50" name="qry" type="text" placeholder="Search">
                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                        </form>
                    </div>
                </div>
                
                <table class="table table-hover">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
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
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->userType); ?></td>
                                    <td>
                                        <a href="users/editUser/<?php echo e($item->id); ?>" type="button" class="p-2"><i class="bi-eye-fill"></i></a>
                                        <a href="users/editUser/<?php echo e($item->id); ?>" type="button" class="p-2"><i class="bi-pencil-fill"></i></a>
                                        <a href="deleteUser/<?php echo e($item->id); ?>" type="button" class=""><i class="btn-trash-color bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($user->onEachSide(1)->links()); ?>

                
            </div>
        </div>
    </div>

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub\resources\views/admin/users.blade.php ENDPATH**/ ?>