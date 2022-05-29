

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row bg-info">
        <div class="container">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-6">
                        <h6 class="justify-content-start">Job Roles</h6>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="" class="d-flex mb-2 justify-content-end">
                            <?php echo csrf_field(); ?>
                            <input class="form-control border-1 w-50" name="userType" type="text" placeholder="Add Job Role">
                            <button type="submit" class="btn btn-primary ms-2">ADD</button>
                        </form>
                    </div>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($userTypeCount== 0): ?>
                            <?php echo e(__('No Entries Found')); ?>

                        <?php else: ?>
                            <?php $__currentLoopData = $uTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->userType); ?></td>
                                    <td>
                                        <a href="#" type="button"  data-toggle="modal" data-target="#ModalEdit<?php echo e($item->id); ?>" class="p-2"><i class="bi-pencil-fill"></i></button>
                                        <a href="deleteUserType/<?php echo e($item->id); ?>" type="button" class=""><i class="btn-trash-color bi-trash-fill"></i></a>
                                    </td>
                                    <?php echo $__env->make('admin.edit-jobrole', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Modal -->
                

               

            </div>
        </div>  
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub-dashboard\resources\views/admin/userType.blade.php ENDPATH**/ ?>