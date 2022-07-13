<?php $__env->startSection('content'); ?>
    <section class="home">
        <img src="<?php echo e(asset('fronte/images/home-img.jpg')); ?>" class="home-img" alt="" />
        <div class="home-content">
            <h1>
                We help to achieve <br /> your goals.
            </h1>
            <p>
                We are <strong>KSR ProjectHub</strong> since 2022 based in Sri lanka.
            </p>
            <p>
                We help IT Students to complete their web projects and assignments. We provide templates for those who want to build their own website.
            </p>
            <a href="contact" class="btn">Contact Us..</a>
        </div>
    </section>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appFront', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/fe/index.blade.php ENDPATH**/ ?>