

<?php $__env->startSection('content'); ?>

<div class="container">

        <div class="row g-2 border w-100 rounded mb-3 bg-info ">

            <div class="d-flex align-items-center  me-2 justify-content-between">
                <h3 class="ms-2"><?php echo e(__('Users')); ?></h3>
                
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true"><i class="fa fa-list"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false"><i class="bi-grid-3x3-gap-fill"></i></button>
                    </li>
                </ul>                
            </div>

        </div>
        
    
    <div class="row bg-primary p-2 mb-3">
        <div class="container">

            <div class="bg-light rounded h-100 p-4">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <form method="GET" action="<?php echo e(route('admin.search')); ?>" class="d-flex mb-2 justify-content-end">
                                    <?php echo csrf_field(); ?>
                                    <input class="form-control border-1 w-50" name="qry" type="text" placeholder="Search">
                                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                                </form>
                            </div>
                        </div>
                        <?php if($userCount== 0): ?>
                            <p><?php echo e(__('No Entries Found')); ?></p>
                        <?php else: ?>                        
                            <table class="table table-hover">
                                <thead class="justify-content-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td scope="col"><?php echo e($loop->index + 1); ?></td>
                                                <td>
                                                    <?php if(Auth::user()->gender == 'm'): ?>
                                                        <img class="rounded-circle" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 60px; height: 60px;">
                                                    <?php elseif(Auth::user()->gender == 'f'): ?>
                                                        <img class="rounded-circle" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 60px; height: 60px;">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($item->fname); ?></td>
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
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row staff-grid-row">
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                                        <div class="profile-widget">
                                            <div class="profile-img">
                                                <a href="profile.html" class="avatar">
                                                    <?php if(Auth::user()->gender == 'm'): ?>
                                                        <img class="rounded-circle" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 80px; height: 80px;">
                                                    <?php elseif(Auth::user()->gender == 'f'): ?>
                                                        <img class="rounded-circle" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 40px; height: 40px;">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="dropdown profile-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i style="color: gray" class="fa-solid fa-ellipsis-vertical me-2"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html"><?php echo e($item->fname); ?></a></h4>
                                            <div class="small text-muted uppercase"><?php echo e($item->userType); ?></div>
                                            <div class="small text-muted"><?php echo e($item->created_at); ?></div>
                                        </div>
                                    </div>
            
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        Et diam et est sed vero ipsum voluptua dolor et, sit eos justo ipsum no ipsum amet sed aliquyam dolore, ut ipsum sanctus et consetetur. Sit ea sit clita lorem ea gubergren. Et dolore vero sanctus voluptua ipsum sadipscing amet at. Et sed dolore voluptua dolor eos tempor, erat amet.
                    </div>
                </div>
                <div class="row">

                </div>
                

                
            </div>
        </div>
    </div>

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KSR-PROJECTHUB\ksr-project-hub-dashboard\resources\views/admin/users.blade.php ENDPATH**/ ?>