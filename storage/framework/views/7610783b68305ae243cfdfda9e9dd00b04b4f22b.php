

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Profile Image</h4>
                <div class="align-items-center ms-2">
                    <div class="position-relative mb-3">

                        <?php if(Auth::user()->profileimage == null): ?>
                            <?php if(Auth::user()->gender == 'm'): ?>
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 200px; height: 200px;">
                            <?php elseif(Auth::user()->gender == 'f'): ?>
                                <img class="rounded-circle mx-auto d-block image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 200px; height: 200px;">
                            <?php endif; ?>                    
                        <?php else: ?>
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" <?php echo e(asset('img/user-images/' . Auth::user()->profileimage  )); ?>" alt="" style="width: 200px; height: 200px;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="_userAvatarFile">Upload image</label>
                    <input type="file" class="form-control" name="_userAvatarFile" id="_userAvatarFile">
                </div>
                <div class="mb-3">
                    <p><?php echo e(date_format(Auth::user()->created_at,'d M Y')); ?></p>
                    <p><?php echo e(date_format(Auth::user()->updated_at,'d M Y')); ?></p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Update User Details</h4>
                <form action="<?php echo e(route('admin.updateprofile')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-6">

                            <!--First Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="fname" value="<?php echo e(Auth::user()->fname); ?>" required autocomplete="fname" autofocus placeholder="john">
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

                        <div class="col-6">
                            <!-- Last Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="lname" value="<?php echo e(Auth::user()->lname); ?>" required autocomplete="lname" autofocus placeholder="doe">
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
                        <div class="col-12">
                            <!-- Full Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="fullname" value="<?php echo e(Auth::user()->fullname); ?>" required autocomplete="fullname" autofocus placeholder="john doe">
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
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <!-- Gender -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="gender" value="<?php echo e(Auth::user()->gender); ?>" required autocomplete="gender" autofocus>
                                    <option selected>Select your gender</option>
                                    <option value="<?php echo e(Auth::user()->gender); ?>" selected>
                                        <?php if(Auth::user()->gender == "f"): ?>
                                            <?php echo e(__('Female')); ?>

                                        <?php elseif(Auth::user()->gender == "m"): ?>
                                            <?php echo e(__('Male')); ?>

                                        <?php endif; ?>
                                    </option>
                                    <option value="f">Female</option>
                                    <option value="m">Male</option>                                   
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
                                    
                            <!-- NIC -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['nic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="nic" value="<?php echo e(Auth::user()->nic); ?>" required autocomplete="nic" placeholder="******V" autofocus>
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

                            <!-- Date Of Birth -->
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control <?php $__errorArgs = ['dateOfBirth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="dob" value="<?php echo e(Auth::user()->dob); ?>" required autocomplete="dob" autofocus>
                                <label for="floatingInput"><?php echo e(__('Date Of Birth')); ?></label>
                                <?php $__errorArgs = ['dateOfBirth'];
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

                            <!-- Password
                            <div class="form-floating mb-3">
                                <input type="password" id="floatingText"  class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" autofocus placeholder="********">
                                <label for="floatingInput"><?php echo e(__('Password')); ?></label>
                                <?php $__errorArgs = ['password'];
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
                            </div> -->
                        </div>
                        
                        <div class="col-6">

                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="email" value="<?php echo e(Auth::user()->email); ?>" required autocomplete="email" autofocus placeholder="name@example.com">
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

                            <!-- Address -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="address" value="<?php echo e(Auth::user()->address); ?>" required autocomplete="address" autofocus placeholder="name@example.com">
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

                            <!-- Phone Number -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingText" name="contactNo" value="<?php echo e(Auth::user()->contactNo); ?>" required autocomplete="contactNo" autofocus placeholder="XXXXXXXXXX">
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
                                
                            <!-- Confirm Password
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingText" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="XXXXXXXXXX">
                                <label for="floatingInput"><?php echo e(__('Confirm Password')); ?></label>
                                <?php $__errorArgs = ['password_confirmation'];
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
                            </div> -->


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
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/admin/profile.blade.php ENDPATH**/ ?>