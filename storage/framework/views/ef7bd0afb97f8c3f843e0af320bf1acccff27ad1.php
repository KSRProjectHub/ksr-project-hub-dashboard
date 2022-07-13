

<?php $__env->startSection('content'); ?>
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('userterms.index')); ?>">Terms and Conditions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms and Conditions List</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <div class="">
            <div class="bg-light rounded p-4 mb-3">
                <div class="row align-middle mb-3">
                    <div class="col-4">
                        <h6 class="justify-content-start">Terms</h6>
                    </div>
                    <div class="col-8">
                        <form method="GET" action="" class="d-flex justify-content-end form-inline">
                            <?php echo csrf_field(); ?>                            
                            <div class="form-group">
                                <input class="form-control border-1 form-inline" id="floatingText" type="text" id="filter" name="filter" placeholder="Enter Title" value="<?php echo e($filter); ?>">
                            </div>

                            <div class="form-group">
                                <button class="butn ms-2" type="submit" data-toggle="tooltip" title="Filter Data"> 
                                    <i class="bi bi-funnel" style="font-size: 1.35em;"></i>
                                </button>   
                                
                                <a type="button" class="butn2 ms-1 form-inline p-0" href="<?php echo e(route('userterms.create')); ?>" data-toggle="tooltip" title="Add New Terms">
                                    <i class="bi bi-file-earmark-plus" style="font-size: 1.35em;"></i>
                                </a>                                
                            </div>


                        </form>

                    </div>
                </div>

                <table class="table table-hover w-100">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title', 'Title'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('version', 'Version'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Added'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('updated_at', 'Updated'));?></th>
                            <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('user_id', 'Added By'));?></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-middle">
                            <td scope="col"><?php echo e($terms->firstItem() + $key); ?></td>
                            <td><?php echo e($items->title); ?></td>
                            <td><?php echo e($items->version); ?></td>
                            <td><?php echo e($items->created_at); ?></td>
                            <td><?php echo e($items->updated_at); ?></td>
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
                            <td scope="col">
                                <a type="button" class="btn btn-outline-primary btn-square" href="<?php echo e(URL::to('admin/userterms/'.$items->id)); ?>">
                                    <i class="fa-solid fa-eye m-r-5"></i>
                                </a>                                
                                <a class="btn btn-outline-dark btn-square" type="button" href="<?php echo e(URL::to('admin/userterms/'.$items->id.'/edit')); ?>">
                                    <i class="fa-solid fa-pencil m-r-5"></i>
                                </a>
                                <a type="button" class="btn btn-outline-danger btn-square" href="userterms/delete/<?php echo e($items->id); ?>">
                                    <span class="fa-layers fa-fw fa-1x">
                                        <i class="fa-solid fa-minus" data-fa-transform="grow-2"></i>
                                    </span>
                                </a>                                    
                            </td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                        
                        
                    </tbody>
                </table>
                <?php echo $terms->appends(Request::except('page'))->render(); ?>

                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing <?php echo e($terms->firstItem()); ?> - <?php echo e($terms->lastItem()); ?> of <?php echo e($terms->total()); ?> terms
                    </div>
                    <div class="col-7 justify-content-end">
                        <?php echo e($terms->onEachSide(1)->links()); ?>

                    </div>
                </div> 
                                
            </div> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/termsandconds/terms.blade.php ENDPATH**/ ?>