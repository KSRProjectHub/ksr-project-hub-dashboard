

<?php $__env->startSection('content'); ?>
<div class="container mb-2">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(Auth::user()->fname.' '.Auth::user()->lname); ?> (<?php echo e(Auth::user()->getUserType()); ?>)</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container mb-3">

    <div class="bg-light rounded h-100 p-4">
        <div class="row">    
            <div class="col-3 border-end">
                <div class="ms-2">
                    <div class="position-relative mb-3">
                        <?php if(Auth::user()->profileimage == null): ?>
                            <?php if(Auth::user()->gender == 'm'): ?>
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 150px; height: 150px;">
                            <?php elseif(Auth::user()->gender == 'f'): ?>
                                <img class="rounded-circle mx-auto d-block image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 150px; height: 150px;">
                            <?php endif; ?>                    
                        <?php else: ?>
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" <?php echo e(asset('img/user-images/' . Auth::user()->profileimage  )); ?>" alt="" style="width: 150px; height: 150px;">
                        <?php endif; ?>
                    </div>
                </div>  
                <div class="mb-3">
                    <label class="form-label" for="_userAvatarFile">Upload image</label>
                    <input type="file" class="form-control" name="_userAvatarFile" id="_userAvatarFile">
                </div>                    
                    
            </div>

            <div class="col-9">

                <div class="row border-bottom mb-3">
                    <div class="col-6">
                        <p>
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-user me-2 fa-stack-1x"></i>
                            </span>
                           <?php echo e(Auth::user()->title); ?> <?php echo e(Auth::user()->fname.' '.Auth::user()->lname); ?><br>

                           <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-user me-2 fa-stack-1x"></i>
                                </span>
                            <?php echo e(Auth::user()->fullname); ?><br>

                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-mobile-screen me-2 fa-stack-1x"></i>
                            </span>
                            <?php echo e(Auth::user()->contactNo); ?><br>
                            
                            <?php if(Auth::user()->gender == 'f'): ?>
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                    <i class="bi bi-gender-female me-2 fa-stack-1x"></i>
                                </span>
                                Female
                            <?php elseif(Auth::user()->gender == 'm'): ?>
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)"> 
                                    <i class="bi bi-gender-male me-2 fa-stack-1x"></i>
                                </span>   
                                Male
                            <?php endif; ?><br>

                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-location-dot me-2 fa-stack-1x"></i>
                            </span>
                            <?php echo e(Auth::user()->address); ?><br>                                
                            
                        </p>   
                    </div>
                    <div class="col-6">
                        <p>
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-at me-2 fa-stack-1x"></i>
                            </span>
                           <a href="mailto:<?php echo e(Auth::user()->email); ?>"> <?php echo e(Auth::user()->email); ?></a><br>
         
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-cake-candles me-2 fa-stack-1x"></i>
                            </span>
                            <?php echo e(\Carbon\Carbon::parse(Auth::user()->dob)->format('Y M d')); ?><br>
        
                            <?php if(Auth::user()->marital_status == "Single"): ?>
                                <?php if(Auth::user()->gender == 'f'): ?>
                                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                        <i class="fa fa-person-dress me-2 fa-stack-1x"></i>
                                    </span>
                                <?php elseif(Auth::user()->gender == 'm'): ?>
                                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">    
                                        <i class="fa fa-person me-2 fa-stack-1x"></i>
                                    </span>
                                <?php endif; ?>
                            <?php elseif(Auth::user()->marital_status == "Married"): ?>
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                    <i class="fa fa-person me-0"></i>
                                    <i class="fa fa-person-dress ms-0"></i>
                                </span>                   
                            <?php elseif(Auth::user()->marital_status == "Engaged"): ?>
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                    <i class="fa fa-ring me-2 fa-stack-1x"></i>
                                </span>
                            <?php endif; ?>
                            <?php echo e(Auth::user()->marital_status); ?><br>
        
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-id-card me-2 fa-stack-1x"></i>
                            </span>
                            <?php echo e(Auth::user()->nic); ?>                            
                        </p>
                    </div>
                </div>

                <div class="mb-3">
                    <p><?php echo e(date_format(Auth::user()->created_at,'d M Y')); ?></p>
                    <p><?php echo e(date_format(Auth::user()->updated_at,'d M Y')); ?></p>
                </div>                    
            </div>

        </div>
    </div>

</div> 

<div class="container">
    <div class="bg-light rounded h-100 p-4">
        <h4 class="mb-3">Update User Details</h4>
        <form method="POST" action="<?php echo e(route('admin.updateprofile')); ?>">
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

                <div class="col-8">
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

                <div class="col-4">
                    <!-- Gender -->
                    <div class="form-floating mb-3">
                        <select type="select" class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="gender" value="<?php echo e(old('gender')); ?>" required autocomplete="gender" autofocus>
                            <option selected>Select your gender</option>
                            <option value="f" <?php echo e(Auth::user()->gender == "f" ? 'selected': ''); ?>>Female</option>
                            <option value="m" <?php echo e(Auth::user()->gender == "m" ? 'selected': ''); ?>>Male</option>                                   
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
unset($__errorArgs, $__bag); ?>" id="floatingText" name="nic" value="<?php echo e(Auth::user()->nic); ?>"  minlength="10" maxlength="12"  autofocus placeholder="**********V" autocomplete="" required>
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
unset($__errorArgs, $__bag); ?>" id="floatingText" name="dob" value="<?php echo e(Auth::user()->dob); ?>" required autocomplete="dob" autofocus>
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
unset($__errorArgs, $__bag); ?>" id="floatingText" name="email" value="<?php echo e(Auth::user()->email); ?>" required autocomplete="email" disabled>
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
unset($__errorArgs, $__bag); ?>" id="floatingSelect" aria-label="Floating label select example" name="marital_status" value="<?php echo e(old('marital_status')); ?>" required autocomplete="marital_status" autofocus>
                            <option selected>Select Marital Status</option>
                            <option value="Single" <?php echo e(Auth::user()->marital_status == "Single" ? 'selected': ''); ?>>Single</option>
                            <option value="Married" <?php echo e(Auth::user()->marital_status == "Married" ? 'selected': ''); ?>>Married</option>
                            <option value="Engaged" <?php echo e(Auth::user()->marital_status == "Engaged" ? 'selected': ''); ?>>Engaged</option>                                   
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
unset($__errorArgs, $__bag); ?>" id="floatingText" name="contactNo" value="<?php echo e(Auth::user()->contactNo); ?>" required autocomplete="contactNo" maxlength="10" autofocus placeholder="XXXXXXXXXX">
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
unset($__errorArgs, $__bag); ?>" id="floatingTextarea" name="address" value="<?php echo e(Auth::user()->address); ?>" required autocomplete="address" autofocus placeholder="Colombo" style="height: 132px; resize: none"><?php echo e(Auth::user()->address); ?></textarea>
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

            <div class="row justify-content-between uppercase">
                <div class="col-6">
                    <button type="submit" class="btn btn-success float-left  btn-block w-25 uppercase">
                        <?php echo e(__('Update')); ?>

                    </button>
                    <button type="reset" class="btn btn-warning float-left  btn-block w-25 uppercase"">
                        <?php echo e(__('Reset')); ?>

                    </button>
                         
                </div>
                <div class="col-6">
                      
                </div>
          
            </div>
          
           
        </form>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/admin/profile.blade.php ENDPATH**/ ?>