

<?php $__env->startSection('content'); ?>
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('users')); ?>">Users</a></li>
                    <li class="breadcrumb-item">Edit</li>
                    <li class="breadcrumb-item"><?php echo e($user->getUserType()); ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($user->fname.' '.$user->lname); ?></li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container bg-info">
    <div class="row">
        <div class="col-3">
            <div class="bg-light rounded h-100 p-4">
                <div class="align-items-center ms-2">
                    <div class="position-relative mb-3">

                        <?php if($user->profileimage == null): ?>
                            <?php if($user->gender == 'm'): ?>
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 100px; height: 100px;">
                            <?php elseif($user->gender == 'f'): ?>
                                <img class="rounded-circle mx-auto d-block image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 100px; height: 100px;">
                            <?php endif; ?>                    
                        <?php else: ?>
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" <?php echo e(asset('img/user-images/' . $user->profileimage  )); ?>" alt="" style="width: 100px; height: 100px;">
                        <?php endif; ?>
                    </div>
                </div>
                <hr>

                <div class="mb-3">
                    <p><strong><?php echo e(__('Registered Date')); ?></strong> </p> 
                    <p><?php echo e($user->created_at->diffForHumans()); ?> 
                    (<?php echo e(date_format($user->created_at,'d M Y')); ?> - <?php echo e($user->created_at->format('h:i:s A')); ?>)</p>
                    <!-- <p><?php echo e($user->updated_at->diffForHumans()); ?> <?php echo e(date_format($user->updated_at,'d M Y')); ?></p> -->
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Update User Details</h4>
                <form action="<?php echo e(route('update.user', $user->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-3">
                            <!-- Title -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="title" value="<?php echo e($user->title); ?>" required autocomplete="title" autofocus>
                                    <option>Select Title</option>
                                    <option value="Miss." <?php echo e($user->title == "Miss." ? 'selected': ''); ?>>Miss.</option>
                                    <option value="Mr." <?php echo e($user->title == "Mr." ? 'selected': ''); ?>>Mr.</option>
                                    <option value="Mrs." <?php echo e($user->title == "Mrs." ? 'selected': ''); ?>>Mrs.</option>                                   
                                </select>
                                <label for="floatingSelect"><?php echo e(__('Title')); ?></label>
                                <?php $__errorArgs = ['title'];
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
                        </div>
        
                        <div class="col-5">
        
                            <!--First Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="fname" value="<?php echo e($user->fname); ?>" required autocomplete="fname" autofocus placeholder="john">
                                <label for="floatingInput"><?php echo e(__('First Name')); ?></label>
                                <?php $__errorArgs = ['fname'];
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
                                
                        </div>
        
                        <div class="col-4">
                            <!-- Last Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="lname" value="<?php echo e($user->lname); ?>" required autocomplete="lname" autofocus placeholder="doe">
                                <label for="floatingInput"><?php echo e(__('Last Name')); ?></label>
                                <?php $__errorArgs = ['lname'];
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
                        </div>
                            
                    </div>
        
                    <div class="row">
                        <div class="col-3">
                            <!-- Add job role  -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select <?php $__errorArgs = ['jobRole'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="role_id" value="<?php echo e($user->getUserType()); ?>" required autocomplete="role" autofocus>
                                    <option >Select Role</option>
                                    <?php $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($roles->id); ?>" <?php echo e($roles->id == $user->role_id ? 'selected': ''); ?>><?php echo e($roles->userType); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="floatingSelect"><?php echo e(__('Role')); ?></label>
                                <?php $__errorArgs = ['jobRole'];
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
                        </div>
        
                        <div class="col-6">
                            <!-- Full Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="fullname" value="<?php echo e($user->fullname); ?>" required autocomplete="fullname" autofocus placeholder="john doe">
                                <label for="floatingInput"><?php echo e(__('Name with Initials')); ?></label>
                                <?php $__errorArgs = ['fullname'];
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
                        </div>
        
                        <div class="col-3">
                            <!-- Gender -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="gender" value="<?php echo e($user->gender); ?>" required autocomplete="gender" autofocus>
                                    <option selected>Select gender</option>
                                    <option value="f" <?php echo e($user->gender == "f" ? 'selected': ''); ?>>Female</option>
                                    <option value="m" <?php echo e($user->gender == "m" ? 'selected': ''); ?>>Male</option>                                   
                                </select>
                                <label for="floatingSelect"><?php echo e(__('Gender')); ?></label>
                                <?php $__errorArgs = ['gender'];
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
                        </div>
        
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <!-- NIC -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['nic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="nic" value="<?php echo e($user->nic); ?>"  minlength="10" maxlength="12"  autofocus placeholder="**********V" autocomplete="" required>
                                <label for="floatingInput"><?php echo e(__('NIC')); ?></label>
                                <?php $__errorArgs = ['nic'];
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
                        </div>
        
                        <div class="col-4">
                            <!-- Date Of Birth -->
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="dob" value="<?php echo e($user->dob); ?>" required autocomplete="dob" autofocus>
                                <label for="floatingInput"><?php echo e(__('Date Of Birth')); ?></label>
                                <?php $__errorArgs = ['dob'];
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
                        </div>
        
                        <div class="col-4">
                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="email" value="<?php echo e($user->email); ?>" required autocomplete="email" autofocus placeholder="name@example.com">
                                <label for="floatingInput"><?php echo e(__('Email')); ?></label>
                                <?php $__errorArgs = ['email'];
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
                        </div>
                    </div>  
                    
                    <div class="row">
                        <div class="col-6">
                            <!-- Marital Status -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select <?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="marital_status" value="<?php echo e($user->marital_status); ?>" required autocomplete="marital_status" autofocus>
                                    <option selected>Select Marital Status</option>
                                    <option value="Single" <?php echo e($user->marital_status == "Single" ? 'selected': ''); ?>>Single</option>
                                    <option value="Married" <?php echo e($user->marital_status == "Married" ? 'selected': ''); ?>>Married</option>
                                    <option value="Engaged" <?php echo e($user->marital_status == "Engaged" ? 'selected': ''); ?>>Engaged</option>                                   
                                </select>
                                <label for="floatingSelect"><?php echo e(__(' Marital Status')); ?></label>
                                <?php $__errorArgs = ['marital_status'];
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
                        </div>
                        
                        <div class="col-6">
                            <!-- Phone Number -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="contactNo" value="<?php echo e($user->contactNo); ?>" required autocomplete="contactNo" maxlength="10" autofocus placeholder="XXXXXXXXXX">
                                <label for="floatingInput"><?php echo e(__('Contact No')); ?></label>
                                <?php $__errorArgs = ['contact_no'];
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
                        </div>
        
                    </div>
        
                    <div class="row">
                        <div class="col-12">
                            <!-- Address -->
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingTextarea" name="address" value="<?php echo e($user->address); ?>" required autocomplete="address" autofocus placeholder="Colombo" style="height: 132px; resize: none"><?php echo e($user->address); ?></textarea>
                                <label for="floatingInput"><?php echo e(__('Address')); ?></label>
                                <?php $__errorArgs = ['address'];
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
                        </div> 
                    </div>
                    <button type="submit" class="btn btn-primary float-left">
                        <?php echo e(__('Update')); ?>

                    </button>
                    <button type="reset" class="btn btn-primary float-left">
                        <?php echo e(__('Reset')); ?>

                    </button>                    
                </form>
            </div>        
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/users/editUser.blade.php ENDPATH**/ ?>