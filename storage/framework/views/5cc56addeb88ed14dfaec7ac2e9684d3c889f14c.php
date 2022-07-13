<form action="<?php echo e(route('update.topic', $items->id)); ?>" class="p-3" method="POST"  enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

     
    <div class="modal fade text-left" id="ModalEditTopic<?php echo e($items->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ms-2"><?php echo e(__('Update')); ?></h4>
                    <button type="button" class="btn-close me-2" data-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row p-2">
                            <div class="col-6 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="floatingText" value="<?php echo e($items->topic); ?>" name="topic">
                                    <label for="floatingInput"><?php echo e(__('User Role')); ?></label>
                                </div>

                            </div>

                        </div> 
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-warning"><?php echo e(__('Save')); ?></button>
                </div>
            </div>
        </div>
    </div>
</form><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/projects/modals/topics/update.blade.php ENDPATH**/ ?>