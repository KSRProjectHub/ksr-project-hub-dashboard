

<?php $__env->startSection('content'); ?>
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('users')); ?>">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('get.topics')); ?>">Topics</a></li>
                </ol>
            </nav>                
        </div>
    </div>
</div>

<div class="container-fluid mb-3">
    <div class="row g-4">
        <div class="">
            <div class="bg-light rounded p-4 mb-3">
                <div class="row align-middle mb-3">
                    <div class="col-4">
                        <h6 class="justify-content-start">Topics</h6>
                    </div>
                    <div class="col-8">
                        <form method="GET" action="" class="d-flex justify-content-end form-inline">
                            <?php echo csrf_field(); ?>                            
                            <div class="form-group">
                                <input class="form-control border-1 form-inline" id="floatingText" type="text" id="filter" name="filter" placeholder="Enter topic name" value="<?php echo e($filter); ?>">
                            </div>

                            <div class="form-group">
                                <button class="butn ms-2" type="submit" data-toggle="tooltip" title="Filter Data"> 
                                    <i class="bi bi-funnel" style="font-size: 1.35em;"></i>
                                </button>   
                                
                                <button type="button" class="butn2 ms-1 form-inline p-0" data-bs-toggle="modal" data-bs-target="#ModalAddTopic" data-toggle="tooltip" title="Add New topic">
                                    <i class="bi bi-file-earmark-plus" style="font-size: 1.35em;"></i>
                                </button>                                
                            </div>


                        </form>

                    </div>
                </div>

                <table class="table table-hover w-100">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('topic', 'Topic'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('user_id', 'Added By'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Added Date'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('updated_at', 'Updated Date'));?></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-middle">
                            <td scope="col"><?php echo e($topics->firstItem() + $key); ?></td>
                            <td><?php echo e($items->topic); ?></td>
                            <td>
                                <?php if($items->profileimage == null): ?>
                                    <?php if($items->gender == 'm'): ?>
                                        <img class="img-thumbnail" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 60px; height: 60px;" data-toggle="tooltip" title="<?php echo e($items->fullname); ?> (<?php echo e($items->userType); ?>)">
                                    <?php elseif($items->gender == 'f'): ?>
                                        <img class="img-thumbnail" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 60px; height: 60px;" data-toggle="tooltip" title="<?php echo e($items->fullname); ?> (<?php echo e($items->userType); ?>)">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img class="img-thumbnail image-previewer" src=" <?php echo e(asset('img/user-images/' . $items->profileimage  )); ?>" alt="" style="width: 60px; height: 60px;" data-toggle="tooltip" title="<?php echo e($items->fullname); ?> (<?php echo e($items->userType); ?>)">
                                <?php endif; ?> 
                            </td>
                            <td><?php echo e($items->created_at); ?></td>
                            <td><?php echo e($items->updated_at); ?></td>
                            <td scope="col">
                                <a class="btn btn-outline-dark btn-square" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditTopic<?php echo e($items->id); ?>">
                                    <i class="fa-solid fa-pencil m-r-5"></i>
                                </a>
                                <a type="button" class="btn btn-outline-danger btn-square" href="delete-topic/<?php echo e($items->id); ?>">
                                    <span class="fa-layers fa-fw fa-1x">
                                        <i class="fa-solid fa-file-circle-minus" data-fa-transform="grow-2"></i>
                                    </span>
                                </a>
                            </td>
                            <?php echo $__env->make('projects.modals.topics.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                        <?php echo $__env->make('projects.modals.topics.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </tbody>
                </table>
                <?php echo $topics->appends(Request::except('page'))->render(); ?>

                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing <?php echo e($topics->firstItem()); ?> - <?php echo e($topics->lastItem()); ?> of <?php echo e($topics->total()); ?> Topics
                    </div>
                    <div class="col-7 justify-content-end">
                        <?php echo e($topics->onEachSide(1)->links()); ?>

                    </div>
                </div> 
                                
            </div> 
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/projects/topic/topics.blade.php ENDPATH**/ ?>