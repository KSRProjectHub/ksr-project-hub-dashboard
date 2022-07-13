

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
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('cust_id', 'Customer ID'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('fname', 'Name'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('projectDoc', 'Group Assignment Document'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('contactNo', 'Contact No.'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('deadline', 'Deadline'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Added Date'));?></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $userDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-middle">
                            <td scope="col"><?php echo e($userDetails->firstItem() + $key); ?></td>
                            <td><?php echo e($items->cust_id); ?></td>
                            <td><?php echo e($items->fname); ?></td>
                            <td><a href="<?php echo e(url('projectDoc')); ?>/<?php echo e($items->cust_id); ?>/<?php echo e($items->projectDoc); ?> "><?php echo e($items->projectDoc); ?></a> </td>
                            <td><?php echo e($items->contactNo); ?></td>
                            <td><?php echo e($items->deadline); ?></td>
                            <td><?php echo e($items->created_at); ?></td>
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
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                        
                    </tbody>
                </table>
                <?php echo $userDetails->appends(Request::except('page'))->render(); ?>

                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing <?php echo e($userDetails->firstItem()); ?> - <?php echo e($userDetails->lastItem()); ?> of <?php echo e($userDetails->total()); ?> Requested projects
                    </div>
                    <div class="col-7 justify-content-end">
                        <?php echo e($userDetails->onEachSide(1)->links()); ?>

                    </div>
                </div> 
                                
            </div> 
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/users/projDetails.blade.php ENDPATH**/ ?>