<form action="<?php echo e(route('topics.create')); ?>" class="p-3" method="POST"  enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

     
    <div class="modal fade text-left" id="ModalAddTopic" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ms-2"><?php echo e(__('Add New Topic')); ?></h4>
                    <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingText" value="" name="topic">
                            <label for="floatingInput"><?php echo e(__('Topic')); ?></label>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-warning"><?php echo e(__('Save')); ?></button>
                    <button type="reset" class="btn btn-info"><?php echo e(__('Reset')); ?></button>
                </div>
            </div>
        </div>
    </div>
</form><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/projects/modals/topics/add.blade.php ENDPATH**/ ?>