<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'KSR PROJECTHUB')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/btnTop.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/05fa2a7c5c.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- Bootstrap 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    <img class="rounded-circle" src="<?php echo e(asset('img/logo/ksr_logo_2.png')); ?>" alt="ksr_logo">
                    <?php echo e(config('app.name', 'KSR-PROJECTHUB')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/users')); ?>"><?php echo e(__('Users')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/projects')); ?>"><?php echo e(__('Projects')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><?php echo e(__('Materials')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><?php echo e(__('Messages')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><?php echo e(__('Pricing')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><?php echo e(__('Reports')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><?php echo e(__('Terms and Conditions')); ?></a>
                        </li>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

        </main>
        
    </div>
    <script src="<?php echo e(asset('js/btnTop.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php if(Session::has('user_type_added')): ?>
        <script>
            toastr.success("<?php echo Session::get('user_type_added'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_type_removed')): ?>
        <script>
            toastr.error("<?php echo Session::get('user_type_removed'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_type_updated')): ?>
        <script>
            toastr.info("<?php echo Session::get('user_type_updated'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_added')): ?>
        <script>
            toastr.success("<?php echo Session::get('user_added'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_removed')): ?>
        <script>
            toastr.error("<?php echo Session::get('user_removed'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_updated')): ?>
        <script>
            toastr.info("<?php echo Session::get('user_updated'); ?>");
        </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/layouts/app2.blade.php ENDPATH**/ ?>